<script>
    import Vue from 'vue'
    import axios from 'axios'
    import VueAxios from 'vue-axios'
    import Coffee from "./Coffee";
    import {mapActions, mapGetters} from 'vuex'

    import VueSlider from 'vue-slider-component'
    import 'vue-slider-component/theme/material.css'

    Vue.use(VueAxios, axios);
    export default {
        name: 'ChooseCoffee',
        components: {
            Coffee,
            VueSlider
        },
        props: {
            url: {
                type: String
            }
        },
        data: function () {
            return {
                sugar: {
                    value: 0,
                },
                coffees: [
                    {
                        id: 1,
                        name: 'Expresso',
                        css: "expresso"
                    },
                    {
                        id: 2,
                        name: 'Café latté',
                        css: "latte"
                    },
                    {
                        id: 3,
                        name: 'Américano',
                        css: "americano"
                    },
                    {
                        id: 4,
                        name: 'Cappucino',
                        css: "cappucino"
                    },
                ]
            }
        },
        methods: {
            ...mapActions([
                'cancelCoffee',
                'addCommandProcess',
                'addCommandSend'
            ]),
            newCommand: function () {

                const formTracking = new FormData();
                formTracking.append('coffeeSelect', JSON.stringify(this.getCoffee));
                formTracking.append('sugarSelect', this.sugar.value);
                this.addCommandProcess()
                Vue.axios.post(this.url, formTracking, {
                    headers: {"content-Type": 'application/json'}
                }).then((response) => {

                    const numero = document.getElementById('numeroCommand')
                    numero.innerText = "" + response.data.resultat

                    this.addCommandSend()
                    setTimeout(function () {
                        pageable.scrollToAnchor('#p-start')
                    }.bind(this), 5000)

                    setTimeout(function () {
                        this.cancelCoffee()
                        this.sugar.value = 0
                    }.bind(this), 6000)
                })
                    .catch(error => {
                        alert('Impossible de passer la commande, prend un thé !');
                    })
            }
        },
        computed: {
            ...mapGetters([
                'getCoffee',
                'isCommandProcess',
                'isCommandSend',
                'isCommandCall'
            ]),
            libelleSugar: function () {

                switch (this.sugar.value) {
                    case 1:
                        return 'Juste un doigt !';
                    case 2:
                        return '2 pour le fun !';
                    case 3:
                        return '3 pour la route !';
                    case 4:
                        return '4 sinon rien !';
                    case 5:
                        return 'Ouiiii plein !';
                }
                return 'Non merci'
            }
        }

    }
</script>
<template>
    <div>
        <div class="bg-teal-500 py-4 px-10">
            <h1 class="text-2xl page2__title text-teal-900">Quel café vous ferez plaisir ?</h1>
        </div>
        <div v-if="!isCommandCall">
            <div class="mt-2 px-10">
                <ul class="coffee__list">
                    <li v-for="coffee in coffees" :key="coffee.id">
                        <coffee :coffee="coffee"></coffee>
                    </li>
                </ul>
            </div>
            <div class="coffee_sugar text-left text-2xl">
                <h2 class="mb-5">Un peu de sucre ? {{ libelleSugar }}</h2>
                <vue-slider v-model="sugar.value"
                            :min="0"
                            :max="5"
                            :interval="1"
                            :marks="true"
                />
            </div>
            <div class="mt-16 px-10 text-center">
                <a @click="newCommand()"
                   class="coffee__command text-white px-6 py-4 text-2xl tracking-tight  bg-teal-500 rounded-full hover:text-white hover:bg-teal-700 cursor-pointer">
                    Je commande !
                </a>
            </div>
            <div class="mt-10 px-10 text-center">
                <a @click="cancelCoffee()" href="#p-start"
                   class="text-red-500 px-4 py-2 border border-red-500 rounded-full hover:text-white hover:bg-red-600 hover:border-red-600">ANNULER</a>
            </div>
        </div>
        <div v-if="isCommandProcess" class="process__bloc">
            <div class="lds-dual-ring"></div>
            <div class="process_title">Un instant s'il vous plaît...</div>
        </div>
        <div v-show="isCommandSend" class="process__bloc">
            <svg id="successAnimation" class="animated" xmlns="http://www.w3.org/2000/svg" width="250" height="250"
                 viewBox="0 0 70 70">
                <path id="successAnimationResult" fill="#D8D8D8"
                      d="M35,60 C21.1928813,60 10,48.8071187 10,35 C10,21.1928813 21.1928813,10 35,10 C48.8071187,10 60,21.1928813 60,35 C60,48.8071187 48.8071187,60 35,60 Z M23.6332378,33.2260427 L22.3667622,34.7739573 L34.1433655,44.40936 L47.776114,27.6305926 L46.223886,26.3694074 L33.8566345,41.59064 L23.6332378,33.2260427 Z"/>
                <circle id="successAnimationCircle" cx="35" cy="35" r="24" stroke="#979797" stroke-width="2"
                        stroke-linecap="round" fill="transparent"/>
                <polyline id="successAnimationCheck" stroke="#979797" stroke-width="2" points="23 34 34 43 47 27"
                          fill="transparent"/>
            </svg>
            <div class="command_title text-gray-800">Votre commande porte le numéro #<span id="numeroCommand"></span>,
                Bonne dégustation
            </div>
        </div>
    </div>
</template>
<style>
    .coffee__list {
        margin: 50px auto 0 auto;
        text-align: center;
    }

    .coffee_sugar {
        width: 800px;
        margin: 30px auto 0 300px;
        text-align: left;
        font-family: 'Lobster', cursive;
        @apply text-gray-800;
    }

    .coffee__list li {
        width: 120px;
        text-align: center;
        display: inline-block;
        margin: 10px 60px;
    }


    .coffee__list li a {
        cursor: pointer;
    }

    .coffee__command {
        font-family: 'Nunito', sans-serif;
        font-weight: bold;
    }

    .coffee__bloc {
        display: block;
        text-align: center;
    }

    .coffee__bloc > div:nth-child(2) {
        margin: 5px 0 0 0;
        font-family: 'Courgette', cursive;
        @apply text-gray-600;
        font-size: 18px;
    }

    .coffee__wrapper {
        text-align: center;
        padding: 15px;
        border-radius: 20%;
        @apply bg-white;
        @apply shadow-xl;
    }

    .coffee {
        @apply fill-current;
        @apply pl-1;
    }

    .lds-dual-ring {
        display: inline-block;

    }

    .process__bloc {
        margin: 150px auto;
        width: 500px;
        text-align: center;
    }

    .process_title {
        font-family: 'Lobster', cursive;
        font-size: 30px;
        margin: 50px 0 0 0;
        @apply text-gray-500;
    }

    .lds-dual-ring:after {
        content: " ";
        display: block;
        width: 150px;
        height: 150px;
        border-radius: 50%;
        border: 5px solid #718096;
        border-color: #718096 transparent #718096 transparent;
        animation: lds-dual-ring 1.2s linear infinite;
    }

    @keyframes lds-dual-ring {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    .command_title {
        font-family: 'Lobster', cursive;
        font-size: 30px;
    }

    #successAnimation {
        margin: 150px auto 0 auto;
    }

    #successAnimationCircle {
        stroke-dasharray: 151px 151px;
        stroke: #00c4b4
    }

    #successAnimationCheck {
        stroke-dasharray: 36px 36px;
        stroke: #00c4b4
    }

    #successAnimationResult {
        fill: #00c4b4;
        opacity: 0
    }

    #successAnimation.animated {
        -webkit-animation: 1s ease-out 0s 1 both scaleAnimation;
        animation: 1s ease-out 0s 1 both scaleAnimation
    }

    #successAnimation.animated #successAnimationCircle {
        -webkit-animation: 1s cubic-bezier(.77, 0, .175, 1) 0s 1 both drawCircle, .3s linear .9s 1 both fadeOut;
        animation: 1s cubic-bezier(.77, 0, .175, 1) 0s 1 both drawCircle, .3s linear .9s 1 both fadeOut
    }

    #successAnimation.animated #successAnimationCheck {
        -webkit-animation: 1s cubic-bezier(.77, 0, .175, 1) 0s 1 both drawCheck, .3s linear .9s 1 both fadeOut;
        animation: 1s cubic-bezier(.77, 0, .175, 1) 0s 1 both drawCheck, .3s linear .9s 1 both fadeOut
    }

    #successAnimation.animated #successAnimationResult {
        -webkit-animation: .3s linear .9s both fadeIn;
        animation: .3s linear .9s both fadeIn
    }

    #replay {
        background: rgba(255, 255, 255, .2);
        border: 0;
        border-radius: 3px;
        bottom: 100px;
        color: #fff;
        left: 50%;
        outline: 0;
        padding: 10px 30px;
        position: absolute;
        -webkit-transform: translateX(-50%);
        transform: translateX(-50%)
    }

    #replay:active {
        background: rgba(255, 255, 255, .1)
    }

    @-webkit-keyframes scaleAnimation {
        0% {
            opacity: 0;
            -webkit-transform: scale(1.5);
            transform: scale(1.5)
        }
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1)
        }
    }

    @keyframes scaleAnimation {
        0% {
            opacity: 0;
            -webkit-transform: scale(1.5);
            transform: scale(1.5)
        }
        100% {
            opacity: 1;
            -webkit-transform: scale(1);
            transform: scale(1)
        }
    }

    @-webkit-keyframes drawCircle {
        0% {
            stroke-dashoffset: 151px
        }
        100% {
            stroke-dashoffset: 0
        }
    }

    @keyframes drawCircle {
        0% {
            stroke-dashoffset: 151px
        }
        100% {
            stroke-dashoffset: 0
        }
    }

    @-webkit-keyframes drawCheck {
        0% {
            stroke-dashoffset: 36px
        }
        100% {
            stroke-dashoffset: 0
        }
    }

    @keyframes drawCheck {
        0% {
            stroke-dashoffset: 36px
        }
        100% {
            stroke-dashoffset: 0
        }
    }

    @-webkit-keyframes fadeOut {
        0% {
            opacity: 1
        }
        100% {
            opacity: 0
        }
    }

    @keyframes fadeOut {
        0% {
            opacity: 1
        }
        100% {
            opacity: 0
        }
    }

    @-webkit-keyframes fadeIn {
        0% {
            opacity: 0
        }
        100% {
            opacity: 1
        }
    }

    @keyframes fadeIn {
        0% {
            opacity: 0
        }
        100% {
            opacity: 1
        }
    }
</style>