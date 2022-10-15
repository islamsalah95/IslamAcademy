<template>
  <div class="VisaCardComponent">
    <main class="main-content">
      <div class="fullwidth-block download">
        <div class="container">
          <div class="row">
            <div v-if="isLoading">
              <BaseSpinner></BaseSpinner>
          </div>
            <h2 class="page-title" style="text-align: center">
              Pay By Visa Card
            </h2>

            <div class="row justify-content-md-center">
              <div class="col-4">
                <form @submit.prevent="pay()" class="contact-form">
                  <div style="text-align: center" class="mb-3 mt-3">
                    <label for="number" class="form-label">Card Number:</label>
                    <input
                      v-model.trim="number"
                      type="number"
                      class="form-control"
                      id="number"
                      name="number"
                    />
                  </div>

                  <div class="date">
                    <div id="date" style="text-align: center" class="mb-3">
                      <label for="exp_month" class="form-label"
                        >Exp Month:</label
                      >
                      <input
                        v-model.trim="exp_month"
                        type="exp_month"
                        class="form-control"
                        id="exp_month"
                        name="exp_month"
                      />
                    </div>

                    <div id="date" style="text-align: center" class="mb-3">
                      <label for="exp_year" class="form-label">Exp Year:</label>
                      <input
                        v-model.trim="exp_year"
                        type="exp_year"
                        class="form-control"
                        id="exp_year"
                        name="exp_year"
                      />
                    </div>
                  </div>

                  <div id="cvccvc" style="text-align: center" class="mb-3">
                    <label for="cvc" class="cvc">cvc:</label>
                    <input
                      v-model.trim="cvc"
                      type="number"
                      class="cvc"
                      id="cvc"
                      name="cvc"
                    />
                  </div>

                  <div style="text-align: center" class="mb-3">
                    <input
                      @click="pay()"
                      type="button"
                      class="button cut-corner"
                      value="submit"
                    />
                  </div>
                </form>
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
import BaseSpinner from './BaseSpinner.vue'
export default {
  name: "VisaCardComponent",
  components:{
    BaseSpinner
  },
  data() {
    return {
      number: 4242424242424242,
      exp_month: 10,
      exp_year: 2024,
      cvc: 123,
      cartId: this.$route.params.data[0].cartId,
      coursePrice: this.$route.params.data[0].coursePrice,
      token: localStorage.getItem("token"),
      isLoading:false
    };
  },
  mounted() {
    // if (this.$route.params==null) {
    //   // return this.$router.push('/CartView')
    //   return console.log(this.$route.params) ;

    // }

    return console.log(this.$route.params);
  },

  methods: {
    async pay() {
      this.isLoading=true
      axios.defaults.headers.common["Accept"] = "application/json";
      axios.defaults.headers.common["Authorization"] = this.token;

     await axios
        .post(
          `http://127.0.0.1:8000/api/stripe-payment/${this.cartId}/${this.coursePrice}`,
          {
            number: this.number,
            exp_month: this.exp_month,
            exp_year: this.exp_year,
            cvc: this.cvc,
          }
        )
        .then((response) => {
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error);
        });

      await Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Your work has been saved",
        showConfirmButton: false,
        timer: 1500,
      });
     
      this.isLoading=false

      return this.$router.push("/PayingsView");
    },
  },
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
.date {
  display: flex;
  justify-content: space-between;
}
#date {
  width: 170px;
}
</style>
