/* global context, dispatch */

import app from './app';
import renderVueComponentToString from 'vue-server-renderer/basic';

// app.$router.push(context.url);

// app.$store.commit('setPackages', { packages: context.packages });

renderVueComponentToString(app, (err, html) => {
    console.log(html)
    if (err) {
        console.log(err);
        throw new Error(err);
    }
    dispatch(html);
});