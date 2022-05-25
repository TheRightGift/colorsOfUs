import Vue from "vue";

let cart = window.localStorage.getItem("coloursOfUscart");
let cartCount = window.localStorage.getItem("coloursOfUscartCount");
let token = window.localStorage.getItem("coloursOfUs");
let intended = window.localStorage.getItem("intended");
let user = window.localStorage.getItem("coloursOfUsUser");
let shippingInfo = window.localStorage.getItem("coloursOfUsUserShipSel");
let customer = window.localStorage.getItem("coloursOfUscustomerid");
let rewop = window.localStorage.getItem("rewop");
let wishlist = [];

function discount(disc, e) {
    let discount = (disc / 100) * e;
    let newPrice = e - Math.round(discount);
    return Math.round(newPrice);
}
let store = {
    strict: true, // Turning on strict mode
    state: {
        cart: cart ? JSON.parse(cart) : [],
        cartCount: cartCount ? parseInt(cartCount) : 0,
        token: token,
        intended: intended,
        user: JSON.parse(user),
        shippingInfo: JSON.parse(shippingInfo),
        customer: customer ? parseInt(customer) : null,
        rewop: rewop ? parseInt(rewop) : null,
        wishlist: wishlist,
    },
    actions: {
        async fetchUserWishlists({ commit }) {
            try {
              const data = await axios.get(`/api/user-wishlist/${store.state.user.id}`)
                commit('SET_USER_WISHLISTS', data.data)
              }
              catch (error) {
                  alert(error)
                  console.log(error)
              }
          }
    },
    mutations: {
        addToCart(state, item) {
            let found = state.cart.find(product => product.id == item.id && (typeof (product.size) == 'object' ? product.size.id == item.size.id : product.size === item.size) && (product.color != undefined ? product.color.id == item.color.id : product.color == undefined)); //

            if (found) {
                item.input ? found.quantity = parseInt(found.quantity) + parseInt(item.input) : found.quantity++;
                found.totalPrice =
                    item.promotionals.length > 0
                        ? found.quantity *
                        discount(item.promotionals[0].discount, item.amount)
                        : found.quantity * item.amount;
            } else {
                state.cart.unshift(item);

                Vue.set(item, 'quantity', item.input ? item.input : 1);
                Vue.set(item, 'totalPrice', item.input
                    ? item.promotionals.length > 0
                        ? item.input * discount(item.promotionals[0].discount, item.amount)
                        : item.input * item.amount
                    : item.promotionals.length > 0
                        ? discount(item.promotionals[0].discount, item.amount)
                        : item.amount);
            }
            state.cartCount = state.cart.length;
            this.commit('saveCart');
        },
        clearCart(state) {
            state.cart = [];
            state.cartCount = state.cart.length;
            window.localStorage.setItem("coloursOfUscart", []);
            window.localStorage.setItem(
                "coloursOfUscartCount",
                state.cart.length
            );
        },
        loggedIn(state, token) {
            window.localStorage.setItem("coloursOfUs", token);
        },
        logout(state) {
            window.localStorage.removeItem("coloursOfUscustomerid");
            window.localStorage.removeItem("coloursOfUsUser");
            window.localStorage.removeItem("intended");
            window.localStorage.removeItem("coloursOfUs");
            Vue.delete(state, "intended");
            state.token = null;
            state.customer = null;
        },
        removeFromCart(state, item) {
            let index = state.cart.indexOf(item);

            if (index > -1) {
                state.cart.splice(index, 1);
                state.cartCount = state.cart.length;
            }
            this.commit("saveCart");
        },
        updateCart(state, item) {
            let found = state.cart.find(
                (product) => product.id == item.item.id
            );

            if (found) {
                if (item.action == true) {
                    found.quantity++;
                } else if (item.action == false && found.quantity != 1) {
                    found.quantity--;
                }
                found.totalPrice = found.quantity * found.amount;
            }

            state.cartCount = state.cart.length;
            this.commit("saveCart");
        },
        saveCart(state) {
            window.localStorage.setItem(
                "coloursOfUscart",
                JSON.stringify(state.cart)
            );
            window.localStorage.setItem(
                "coloursOfUscartCount",
                state.cartCount
            );
        },
        saveCustomer(state, detail) {
            window.localStorage.setItem("coloursOfUscustomerid", detail);
            state.customer = customer;
        },
        saveUser(state, detail) {
            window.localStorage.setItem(
                "coloursOfUsUser",
                JSON.stringify(detail)
            );
        },
        shipping(state, detail) {
            window.localStorage.setItem(
                "coloursOfUsUserShipSel",
                JSON.stringify(detail)
            );
        },
        rewop(state, detail) {
            window.localStorage.setItem("rewop", detail);
        },
        SET_USER_WISHLISTS(state, data) {
            state.wishlist = data.wishlists;
        },
        addToWishList(state, data) {
            state.wishlist.push(data);
        },
        removeFromWishList(state, data) {
            let wishlist = state.wishlist;

            state.wishlist = wishlist.filter(el => el.product_id != data.id);
        },
    },
};

export default store;
