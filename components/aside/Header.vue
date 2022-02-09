<template>
    <header class="navbar">
        <div class="logo-section" @click="showMenu()" v-click-outside="hideMenu">
            <NuxtLink class="logo" to="/">
                <img src="~/assets/media/img/main_logo.png">
            </NuxtLink>
            <div class="dropdown">
                Студия
            </div>
            <img class="bottom-angle" v-bind:class="{active: menu === true}" style="height: 6px;margin-left:7px; margin-bottom: -3px;" src="~/assets/media/img/angle_bottom_white.svg">
            <div class="menu" v-bind:class="{active: menu === true}">
                <ul>
                    <li>На главную</li>
                    <li>В магазин</li>
                    <li>FAQ</li>
                    <li>Контакты</li>
                </ul>
            </div>
        </div>
        <div class="right-side">
            <div class="user" @click="() => this.$modal.show('profile')">
                <img width="35px" height="35px" src="~/assets/media/img/user.svg" />
                <Profile />
            </div>
            <div class="cart" v-click-outside="hideCart">
                <div class="cart-total" @click="showCart()">
                    <div class="cart-total-label">
                        Стоимость корзины:
                    </div>
                    <div class="cart-total-price" v-bind:class="{active: cart === true}">
                        {{totalPrice}} ₽<img style="margin-left:5px; margin-bottom: 1px;" src="~/assets/media/img/angle_bottom_white.svg">
                    </div>
                </div>
                <div class="cart-open">
                    <div class="open-link">
                        <img style="margin-top: 1px; margin-right:5px;" src="~/assets/media/img/cart_right.svg">
                        <div class="link-button">Перейти</div>
                    </div>
                    <div class="open-icon">
                        <img src="~/assets/media/img/cart_btn.svg" />
                    </div>
                </div>
                <Cart :active="cart"/>
            </div>
        </div>
    </header>
</template>

<script>
import Cart from '~/components/aside/Cart'
import Profile from '~/components/aside/Profile'
export default {
    components: {
        Cart,
        Profile
    },
    data() {
        return {
            cart: false,
            menu: false
        }
    },
    methods: {
        showCart: function () {
            this.cart = !this.cart
        },
        showMenu: function () {
            this.menu = !this.menu
        },
        hideMenu: function (e) {
            this.menu = false
        },
        hideCart: function (e) {
            this.cart = false
        }
    },
    computed: {
        totalPrice: function () {
            return this.$store.getters['cart/totalPrice']
        }
    }
}
</script>

