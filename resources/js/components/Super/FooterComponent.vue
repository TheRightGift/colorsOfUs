<template>
    <footer class="sticky-footer bg-white" :class="{'mtTop': $store.state.user.role_id == null}">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span
                    >Copyright &copy; ColourOfUs
                    {{ date.getFullYear() }}.</span
                >
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        name: "Footer",
        data() {
            return {
                date: new Date(),
            };
        },
    };
</script>
<style scoped>
@media (max-width: 1023px) {
    .mtTop {
        margin-top: 13vh;
    }
}
</style>
