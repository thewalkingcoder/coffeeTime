<script>
    export default {
        name: 'Home',
        props: {
            url: {
                type: String
            }
        }
    }
</script>
<template>
    <div class="w-1/2 mx-auto">
        <h1 class="app__title text-gray-700">Coffee Time !</h1>
        <a href="#p-command" style="width: 340px" class="mt-10 text-center mx-auto outline-none rounded-full px-6 py-4 bg-pink-600 hover:bg-pink-700 text-white text-2xl flex">
                        <svg class="mr-4 mt-1" enable-background="new 0 0 26 29" height="29px"  version="1.1" viewBox="0 0 26 29"
                 width="26px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                 xmlns:xlink="http://www.w3.org/1999/xlink"><g>
                        <path d="M1.035,9l3.49,17.478C4.525,27.854,5.643,29,7.019,29H13h5.981c1.376,0,2.493-1.146,2.493-2.522L24.965,9   H13H1.035z"
                              fill="#FFFFFF"/>
                        <path d="M23.524,3H21V2.824C21,1.264,19.736,0,18.176,0H7.824C6.264,0,5,1.264,5,2.824V3H2.476   C0.946,3,0,3.939,0,5.468V7h7.824h10.352H26V5.468C26,3.939,25.053,3,23.524,3z"
                              fill="#FFFFFF"/>
                    </g>
            </svg>
            <span class="font-bold tracking-wide">Commander un café</span>
        </a>
    </div>
</template>
<style>

</style>