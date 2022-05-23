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
function pushToCart(state, item) {
    state.cart.unshift(item);
    if (item.input) {
        Vue.set(item, "quantity", item.input);
    } else Vue.set(item, "quantity", 1);
    Vue.set(
        item,
        "totalPrice",
        item.input
            ? item.promotionals.length > 0
                ?item.input * discount(item.promotionals[0].discount, item.amount)
                : item.input * item.amount
            : item.promotionals.length > 0
            ? discount(item.promotionals[0].discount, item.amount)
            : item.amount
    );
}
function discount(disc, e) {
    let discount = (disc / 100) * e;
    let newPrice = e - Math.round(discount);
    return Math.round(newPrice);
}
function founded(found, state, item, products) {
    // if (!found && products.length > 0) {
    //     console.log('here');
    //     let prd = products[0];
    //     prd.color = item.colorFilter;
    //     prd.size = item.sizeFilter;
    //     if (item.input) {
    //         prd.quantity = parseInt(item.input);
    //     }
    //     else prd.quantity++;
    //     prd.totalPrice = prd.quantity * prd.amount;
    //     state.cart.push(prd);
    // }
    if (found) {
        if (item.input) {
            found.quantity = parseInt(found.quantity) + parseInt(item.input);
        } else found.quantity++;
        found.totalPrice =
            found.promotionals.length > 0
                ? found.quantity *
                  discount(found.promotionals[0].discount, found.amount)
                : found.quantity * found.amount;
    } else {
        pushToCart(state, item);
    }
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
    mutations: {
        addToCart(state, item) {
            // console.log(item, );
            let found = state.cart.find(product => (typeof(product.size) == 'object' ? product.size.id == item.size.id : product.size === item.size) && product.id == item.id && product.color.id == item.color.id);

            if (found) {
                console.log(item, 'found', found, );
                found.quantity++;
                found.totalPrice = found.quantity * found.amount;
            } else {
                console.log(item, 'new');

                state.cart.unshift(item);

                Vue.set(item, 'quantity', 1);
                Vue.set(item, 'totalPrice', item.amount);
            }

            state.cartCount = state.cart.length;
            this.commit('saveCart');
            console.log(state.cart, item);
            // If product has colorFilter || sizeFilter / both
            // Run a filter search and return the first
            // Else run a fin req
            // console.log(item, "i", state.cart);
            // let found;
            // let bothFilters = item.color && item.size;
            // let eitherFilters = item.color || item.size;
            // if (bothFilters || eitherFilters) {
            //     let products = state.cart.filter(
            //         (product) => product.id == item.id
            //     );
            //     if (bothFilters) {
            //         found = products.find(
            //             (product) =>
            //                 (product.size.id == item.size.id || product.size == item.size) &&
            //                 product.color.id == item.color.id
            //         );
            //         // if (!found) {
            //         //     Object.create({}, item);
            //         // }
            //     } else if (eitherFilters) {
            //         found = products.find(
            //             (product) =>
            //                 (product.size.id == item.size.id || product.size == item.size) ||
            //                 product.color.id == item.color.id
            //         );
            //     }
            //     // } else if (item.color) {
            //     //     found = products.find(
            //     //         (product) =>
            //     //             product.color.id == item.color.id
            //     //     );
            //     // }
            //     // founded(found, state, item, products);
            //     console.log(products, item);
            // } else {
            //     found = state.cart.find((product) => product.id == item.id);
            //     founded(found, state, item);
            // }
            // console.log(found);
            // if (found) {
            //     // if (item.colorFilter && item.sizeFilter) {
            //     //     console.log(item.colorFilter, item.sizeFilter);
            //     //     if (item.colorFilter[0].id == found.color[0].id && item.sizeFilter[0].id == found.size[0].id) {

            //     //     }
            //     //     else if (item.colorFilter[0].id != found.color[0].id || item.sizeFilter[0].id != found.size[0].id) {

            //     //     }
            //     //     // check if found item has same color and size
            //     //     // if it has add up to the previous quantity
            //     //     // else run a new cart
            //     // }
            //     // // else if (item.colorFilter || item.sizeFilter) {
            //     //     console.log('either is missing!');
            //     // }
            //     else if (!item.colorFilter || !item.sizeFilter) {
            //         if (item.input) {
            //             found.quantity = parseInt(found.quantity) + parseInt(item.input);
            //         }
            //         else found.quantity++;
            //     }
            //     found.totalPrice = found.quantity * found.amount;
            // } else {
            //     pushToCart(state, item);
            // }

            state.cartCount = state.cart.length;
            this.commit("saveCart");
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
        saveWishlist(state, data) {
            state.wishlist = data;
        },
        addToWishList(state, data) {
            console.log(data);
            state.wishlist.push(data);
        },
        removeFromWishList(state, data) {
            let index = state.wishlist.indexOf(data);

            if (index > -1) {
                state.wishlist.splice(index, 1);
            }
        },
    },
};

export default store;
