let cart = window.localStorage.getItem('coloursOfUscart');
let cartCount = window.localStorage.getItem('coloursOfUscartCount');
let token = window.localStorage.getItem('coloursOfUs');
let intended = window.localStorage.getItem('intended');
let user = window.localStorage.getItem('coloursOfUsUser');
let customer = window.localStorage.getItem('coloursOfUscustomerid');
let rewop = window.localStorage.getItem('rewop');
let wishlist = [];
let store = {
    state: {
        cart: cart ? JSON.parse(cart) : [],
        cartCount: cartCount ? parseInt(cartCount) : 0,
        token: token,
        intended: intended,
        user: JSON.parse(user),
        customer: customer ? parseInt(customer): null,
        rewop: rewop ? parseInt(rewop): null,
        wishlist: wishlist,
    },
    mutations: {
        addToCart(state, item) {
            let found = state.cart.find(product => product.id == item.id);

            if (found) {
                found.quantity++;
                found.totalPrice = found.quantity * found.amount;
            } else {
                state.cart.push(item);

                Vue.set(item, 'quantity', 1);
                Vue.set(item, 'totalPrice', item.amount);
            }

            state.cartCount = state.cart.length;
            this.commit('saveCart');
        },
        clearCart(state) {
            state.cart = [];
            state.cartCount = state.cart.length;
            window.localStorage.setItem('coloursOfUscart', []);
            window.localStorage.setItem('coloursOfUscartCount', state.cart.length);
        },
        loggedIn(state, token) {
            window.localStorage.setItem('coloursOfUs', token);
        },
        logout() {
            window.localStorage.removeItem('coloursOfUscustomerid');
            window.localStorage.removeItem('coloursOfUsUser');
            window.localStorage.removeItem('intended');
            window.localStorage.removeItem('coloursOfUs');
        },
        removeFromCart(state, item) {
            let index = state.cart.indexOf(item);
        
            if (index > -1) {
                state.cart.splice(index, 1);
                state.cartCount = state.cart.length;
            }
            this.commit('saveCart');
        },
        updateCart(state, item) {
            let found = state.cart.find(product => product.id == item.item.id);

            if (found) {
                item.action == true ? found.quantity++ : found.quantity--;
                found.totalPrice = found.quantity * found.amount;
            }

            state.cartCount = state.cart.length;
            this.commit('saveCart');
        },
        saveCart(state) {
            window.localStorage.setItem('coloursOfUscart', JSON.stringify(state.cart));
            window.localStorage.setItem('coloursOfUscartCount', state.cartCount);
        },
        saveCustomer(state, detail) {
            window.localStorage.setItem('coloursOfUscustomerid', detail);
            state.customer = customer;
        },
        saveUser(state, detail) {
            window.localStorage.setItem('coloursOfUsUser', JSON.stringify(detail));
        },
        rewop(state, detail) {
            window.localStorage.setItem('rewop', detail);
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
        }


    }
};

export default store;