<template>
  <div class="CartComponent">
    <main class="main-content">
      <div class="fullwidth-block download">
        <div class="container">
          <div class="row">
            <h1 v-if="!cartItems">Cart is Empty</h1>
            <div
              v-for="cartItem in cartItems"
              :key="cartItem.id"
              class="col-md-4"
            >
              <div class="item">
                <router-link :to="'/Blog/' + cartItem.course_id">
                  <div class="image">
                    <figure>
                      <img src="../assets/web/test.jpg" alt="error" />
                      <p>{{ cartItem.image }}</p>
                    </figure>
                  </div>
                </router-link>

                <div>
                  <h1 class="item-title">{{ cartItem.course_title }}</h1>
                  <h3
                    style="text-align: center; padding: 7px 0px"
                    class="item-title"
                  >
                    {{ cartItem.course_price }}$
                  </h3>
                  <h6>{{ cartItem.id }}</h6>
                </div>
                <div class="buttns">
                  <!-- <router-link 
                    :to="'/VisaCardComponent'"> -->
                  <a
                    href="#"
                    @click="
                      $router.push({
                        name: 'VisaCardComponent',
                        params: {
                          data: [
                            {
                              cartId: cartItem.id,
                              coursePrice: cartItem.course_price,
                            },
                          ],
                        },
                      })
                    "
                    class="button small primary"
                    >pay</a
                  >
                  <!-- </router-link> -->

                  <a
                    @click="delet(cartItem.id)"
                    href="#"
                    class="button small secondary"
                    >delet</a
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";

export default {
  name: "CartComponent",
  data() {
    return {
      cartItems: null,
      dataopject: "",
      // eg: "",
      // doller: "",
      token: localStorage.getItem("token"),
    };
  },
  mounted() {
    return this.show();
  },

  methods: {
    show() {
      axios.defaults.headers.common["Accept"] = "application/json";
      axios.defaults.headers.common["Authorization"] = this.token;

      axios
        .get("http://127.0.0.1:8000/api/showcart")
        .then((response) => (this.cartItems = response.data.data.cartItems))
        .catch((error) => console.log(error));
    },

    delet(cartItem) {
      axios.defaults.headers.common["Accept"] = "application/json";
      axios.defaults.headers.common["Authorization"] = this.token;
      axios
        .delete(`http://127.0.0.1:8000/api/destroyItem/${cartItem}`)
        .then((response) => {
          if (response.data.success) {
            Swal.fire({
              position: "top-end",
              icon: "success",
              title: "Your work has been saved",
              showConfirmButton: false,
              timer: 1500,
            });
          } else {
            console.log(response.data.data);
          }
        })
        .catch((error) => console.log(error));
      this.cartItems = "";

      return this.show();
    },
  },
  // watch: {
  //   eg: function (v) {
  //     this.doller = v * 20;
  //   },
  //   doller: function (v) {
  //     this.eg = v / 20;
  //   },
  // },
};
</script>

<style scoped>
.item {
  *zoom: 1;
  padding-bottom: 20px;
  margin-bottom: 20px;
  border-bottom: 0px solid #2c2c2c;
  display: flex;
  flex-direction: column;
  align-content: center;
  justify-content: center;
  align-items: center;
}

img {
  width: 209px;
}

.buttns {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  align-items: center;
}

.image {
  margin-top: 10px;
  margin-bottom: 10px;
}
</style>
