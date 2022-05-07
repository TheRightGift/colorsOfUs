<template>
    <div>
        <p class="bordered">
            <a @click="addToCart(resourceOpened)">Add to cart</a>
        </p>
    </div>
</template>
<script>
    export default {
        name: "AddToCartBtn",
        data() {
            return {
                cart: "",
                storage: [],
            };
        },
        methods: {
            addToCart(res) {
                this.$store.commit("addToCart", res);
            },
        },
        props: ["resourceOpened", "offlineCart"],
    };
</script>
<style>
    p.bordered a:hover {
        border-color: #000;
        cursor: pointer;
    }
</style>