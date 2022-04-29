<template>
    <div>
        <div class="jalaina">
            <div class="fixed__footer">
                <header-component />
                <div class="">
                    <main role="main">
                       <h1>Dashboard for Users</h1>
                    </main>
                    <footer-component />
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import FooterComponent from "./FooterComponent.vue";
    import HeaderComponent from "./HeaderComponent.vue";
    export default {
        components: { HeaderComponent, FooterComponent },
        mounted() {
            console.log("Component mounted.");
        },
    };
</script>