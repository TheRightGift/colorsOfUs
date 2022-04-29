<template>
    <footer class="sticky-footer bg-white">
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
