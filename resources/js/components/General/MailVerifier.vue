<template>
    <div>
        <div class="container">
            <i class="fa fa-spinner fa-spin fa-5x fa-fw"></i>
            <span class="sr-only">Loading...</span>
            <div class="overlay"></div>
            <p>Verifying your email...</p>
        </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            load: true,
        }
    },
    mounted() {
        this.verifyUser()
    },
    methods: {
        verifyUser(code) {
            code = window.location.href.split('/').pop()
            axios.get('/api/basic.verify/' + code).then((res) => {
                if (res.data.status == 1) {
                    this.load = !this.load
                    location.replace('/auth')
                }
            })
        },
    },
}
</script>
<style scoped>
.container {
    position: absolute;
    top: 50%;
    left: 90%;
    -moz-transform: translateX(-50%) translateY(-50%);
    -webkit-transform: translateX(-50%) translateY(-50%);
    transform: translateX(-50%) translateY(-50%);
}
</style>