<template>
    <modal name="profile" height="250px" width="35%" class="profile-modal">
        <div class="profile">
            <div class="img" :style="{ background: 'url(' + itemImage + ') center / cover no-repeat' }">
            </div>
            <div class="content">
                <div class="name">Pixel1917 (Сергей Галактионов)</div>
                <div class="short-info">
                    <div class="likes">
                        <div class="like" :style="{ background: 'url(' + likeImage + ') center / contain no-repeat' }">
                        </div>
                        57
                    </div>
                    <div class="orders">
                        Заказал: 3 вещи
                    </div>
                    <div class="follow">
                        Повторили: 37 человек
                    </div>
                </div>
            </div>
        </div>
        <div class="to-profile">
            <a href="">Перейти</a>
        </div>
    </modal>
</template>

<script>
export default {
    data() {
        return {
            itemImage:  require('@/assets/media/img/user.JPG'),
            likeImage:  require('@/assets/media/img/heart.png'),
        }
    }
}
</script>