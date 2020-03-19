<template>
    <nav id="pagination">
        <ul class="page-guides" v-if="this.$store.state.paginator.totalPageCount > 1">
            <li>
                <nuxt-link v-if="currentPage > 1" :to="{ path: $route.path, query: { page: 1 }}">First</nuxt-link>
                <a href="#" class="active" v-else>First</a>
            </li>
            <li>
                <nuxt-link v-if="currentPage > 1" :to="{ path: $route.path, query: { page: currentPage - 1 }}">Previous</nuxt-link>
                <a href="#" class="active" v-else>Previous</a>
            </li>
            <li v-for="num in this.pageNumbers" v-bind:style="{ width: (100 / pageNumbers.length) + '%' }">
                <nuxt-link v-if="num !== currentPage" :to="{ path: $route.path, query: { page: num } }">{{ num }}</nuxt-link>
                <a v-else href="#" class="active">{{ num }}</a>
            </li>
            <li>
                <nuxt-link v-if="currentPage < $store.state.paginator.totalPageCount" :to="{ path: $route.path, query: { page: currentPage + 1 }}"> Next</nuxt-link>
                <a href="#" class="active" v-else>Next</a>
            </li>
            <li>
                <nuxt-link v-if="currentPage < $store.state.paginator.totalPageCount" :to="{ path: $route.path, query: { page: $store.state.paginator.totalPageCount }}">Last</nuxt-link>
                <a href="#" class="active" v-else>Last</a>
            </li>
        </ul>
        <h1>{{$store.state.paginator.totalPageCount}}</h1>
    </nav>
</template>

<script>
    export default {
        name: "Paginator",
        data () {
            return {
                pageNumbers: []
            }
        },
        computed : {
            currentPage: function(){
                return parseInt(this.$route.query.page?this.$route.query.page:1);
            }
        },
        mounted () {
            this.setPages();
            let here = this;
            this.$store.subscribe(function(newValue){
                if(newValue.type === 'paginator/setLastPage'){
                    here.setPages();
                }
            });
        },
        methods: {
            setPages () {
                let pages = [];
                let last = this.$store.state.paginator.totalPageCount;
                for (let i = 1; i <= last; i++) {
                    pages.push(i);
                }
                this.pageNumbers = pages;
            }
        }
    }
</script>

<style scoped>

    ul.page-guides {
        display: inline-block;
        padding: 0;
        margin: 0;
    }

    ul.page-guides li {display: inline;}

    ul.page-guides li a {
        float: left;
        padding: 8px 16px;
        text-decoration: none;
    }
    ul.page-guides li a.active {
        color: white;
        float: left;
        padding: 8px 16px;
        text-decoration: none;
    }

</style>
