<script>
    import { mapActions, mapGetters } from 'vuex'

    export default {
        name: 'Coffee',
        props: {
            coffee: {
                type: Object
            }
        },
        methods: {
            ...mapActions([
                'addCoffee'
            ]),
            selectCoffee: function () {
                this.addCoffee(this.coffee)

            }
        },
        computed: {
            ...mapGetters([
                'getCoffee'
            ]),
            coffeeCss: function () {
                return "coffee__" + this.coffee.css
            },
            coffeeWrapperCss: function () {

                let coffeeActive = ""

                if (this.getCoffee && (this.coffee.id == this.getCoffee.id)) {
                    coffeeActive = " coffee__active"
                }
                return coffeeActive
            }
        }
    }
</script>
<template>
    <div>
        <a @click="selectCoffee()" :class="['coffee__bloc',coffeeWrapperCss]">
            <div :class="['coffee__wrapper ', coffeeCss]">
                <svg version="1.1" viewBox="0 0 500 500" class="coffee" xml:space="preserve"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path clip-rule="evenodd" d="M31.949,334.446c0,50.971,41.249,92.222,92.221,92.222H275.89  c50.971,0,92.223-41.251,92.223-92.222v-18.439c37.521-28.523,99.938-49.331,99.938-107.393c0-40.155-32.527-72.683-72.685-72.683  c-9.633,0-18.807,1.819-27.254,5.271v-32.527c0-20.079-16.267-36.343-36.341-36.343H68.29c-20.077,0-36.34,16.264-36.34,36.343  V334.446z M368.112,264.035v-55.421c0-15.083,12.172-27.256,27.254-27.256c15.085,0,27.258,12.174,27.258,27.256  C422.624,236.688,394.276,247.592,368.112,264.035z M113.718,135.932v181.71c0,9.987-8.181,18.168-18.17,18.168  c-9.992,0-18.173-8.181-18.173-18.168v-181.71c0-9.992,8.181-18.17,18.173-18.17C105.537,117.761,113.718,125.94,113.718,135.932z"  /></svg>
            </div>
            <div>{{coffee.name}}</div>
        </a>
    </div>
</template>
<style>
    .coffee__expresso {
        @apply text-yellow-700;
        @apply bg-white;
    }

    .coffee__latte {
        @apply text-purple-800;
        @apply bg-white;
    }

    .coffee__americano {
        @apply text-orange-700;
        @apply bg-white;
    }

    .coffee__cappucino {
        @apply text-pink-700;
        @apply bg-white;
    }

    .coffee__active .coffee__expresso {
        @apply text-white;
        @apply bg-yellow-700;
    }

    .coffee__active .coffee__latte {
        @apply text-white;
        @apply bg-purple-800;
    }

    .coffee__active .coffee__americano {
        @apply text-white;
        @apply bg-orange-700;
    }

    .coffee__active .coffee__cappucino {
        @apply text-white;
        @apply bg-pink-700;
    }
</style>