<template>
    <div class="stack">
        <div class="stack-content">
            <div class="stack-top">
                <span>Мой гардероб</span>
                <div class="stack-counter">
                    {{wardrobe.length}}/5
                </div>
            </div>
            <client-only>
                <div class="add-model-tip" v-if="wardrobe.length === 0">
                    <img :src="plusImg">
                    <span>Добавьте модель</span>
                </div>
            </client-only>
            <div class="selected-items">
                <div class="selected-item" v-for="item in wardrobe" :key="item.index" v-bind:class="{active: item.index === editedItem}">
                    <div class="main-block">
                        <div class="eye-hidden" v-bind:class="{active: item.index === activeBody}"><img src="~/assets/media/img/hidden.svg" alt="Иконка показа товара"></div>
                        <div class="item-image" :style="{ background: 'url(' + itemImage + ') center / contain no-repeat' }"></div>
                        <span class="price">{{item.start_price}} ₽</span>
                        <div class="controls">
                            <div class="control-btn" @click="remove(item)"><img src="~/assets/media/img/close.svg"></div>
                            <div class="control-btn" @click="show(item)"><img src="~/assets/media/img/eye.svg"></div>
                            <div class="control-btn" @click="copy(item)"><img src="~/assets/media/img/copy.svg"></div>
                            <div class="control-btn" @click="toCart(item)"><img src="~/assets/media/img/cart.svg"></div>
                        </div>
                    </div>
                    <div class="action-edit"><button @click="edit(item)">Редактор</button></div>
                </div>
            </div>
        </div>
        <div class="remove-button" v-on:click="removeAll">Удалить все</div> 
    </div>
</template>

<script>
export default {
    name: 'Stack',
    data() {
        return {
            itemImage:  require('@/assets/media/img/std_tshirt.png'),
            plusImg : require('@/assets/media/img/plus.png'),
        }
    },
    computed: {
        wardrobe () {
            return this.$store.getters['wardrobe/wardrobe']
        },
        editedItem () {
            return this.$store.getters['wardrobe/editedItemIndex']
        },
        activeBody () {
            return this.$store.getters['wardrobe/activeBody']
        }
    },
    methods: {
        reloadModel: function(defaultsArray) {
            for (let i = 0; i < defaultsArray.length; i++) {
                this.$eventHub.$emit('dummy:dummy_reload_tshirt', defaultsArray[i]['model_name'], defaultsArray[i]['model_type'], defaultsArray[i]['color'])
            }
        },
        setActiveType: function(item) {
            let settings = {
                type: item.type,
                index: item.index
            }
            if(this.activeBody === item.index) {
                this.$eventHub.$emit('dummy:clean_model')
                settings.index = null
            } else {
                this.reloadModel(item.settings)
            }
            this.$store.commit('wardrobe/setActiveClothes', settings)
        },
        edit: function(item) {
            this.$store.dispatch('wardrobe/setCurrentItems', item)
            this.reloadModel(item.settings)
        },
        show: function(item) {
            if(this.editedItem !== item.index) {
                this.setActiveType(item)
            }
        },
        copy: function(item) {
            if(this.$store.getters['wardrobe/wardrobe'].length < 5) {
                this.$store.commit('wardrobe/copy', item.index)
            } else {
                this.$modal.show('dialog', {
                    title: 'Достигнут лимит гардероба!',
                    text: 'При копировании достигнут лимит гардероба, удалите одну или несколько вещей чтобы освободить место',
                    buttons: [
                        {
                            title: 'Понятно',
                            handler: () => {
                                this.$modal.hide('dialog')
                            }
                        },
                    ]
                })
            }
        },
        toCart: function(item) {
            this.$store.commit('cart/add', item)
        },
        remove: function (item) {
            this.$modal.show('dialog', {
                title: 'Подвтержение удаления!',
                text: 'Вы уверены что хотите удалить вещь со всеми её конфигурациями?',
                buttons: [
                    {
                        title: 'Нет',
                        handler: () => {
                            this.$modal.hide('dialog')
                        }
                    },
                    {
                        title: 'Да',
                        handler: () => {
                            this.$store.commit('wardrobe/remove', item)
                            this.$modal.hide('dialog')
                            if (this.activeBody !== null) {
                                let item = this.wardrobe.find(product => product.index === this.activeBody)
                                this.reloadModel(item.settings)
                            } else {
                                this.$eventHub.$emit('dummy:clean_model')
                            }
                            if (this.editedItem === item.index || this.wardrobe.length === 0) {
                                this.$store.commit('wardrobe/stopEditing')
                            }
                        }
                    },
                ]
            }) 
        },
        removeAll: function() {
            this.$modal.show('dialog', {
                title: 'Подвтержение удаления!',
                text: 'Вы уверены что хотите удалить все вещи со всеми их конфигурациями?',
                buttons: [
                    {
                        title: 'Нет',
                        handler: () => {
                            this.$modal.hide('dialog')
                        }
                    },
                    {
                        title: 'Да',
                        handler: () => {
                            this.$store.commit('wardrobe/stopEditing')
                            this.$store.commit('wardrobe/clear')
                            this.$modal.hide('dialog')
                            this.$eventHub.$emit('dummy:clean_model')
                        }
                    },
                ]
            })     
        }
    },
    mounted() {
        this.$store.commit('wardrobe/stopEditing')
        this.$store.commit('wardrobe/resetGender')
    }
}
</script>