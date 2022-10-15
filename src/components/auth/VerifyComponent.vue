<template>
  <div class="Contact">
    <main class="main-content">
      <div class="fullwidth-block inner-content">
        <div class="container">
          <h2 class="page-title" style="text-align: center">verify</h2>

          <div class="row justify-content-md-center">
            <div class="col-4">
              <form @submit.prevent="codeMetod" class="contact-form">
                <div style="text-align: center" class="mb-3">
                  <label for="code" class="form-label">code:</label>
                  <input
                    v-model.trim="code"
                    type="number"
                    class="form-control"
                    id="code"
                    placeholder="Enter code"
                    name="code"
                  />
                </div>

                <div style="text-align: center" class="mb-3">
                  <input
                    @click="codeMetod"
                    type="button"
                    class="button cut-corner"
                    value="submit"
                  />
                </div>
              </form>
              <div style="text-align: center" class="mb-3">
                <input
                  @click="send"
                  type="button"
                  class="button cut-corner"
                  value="resend"
                />
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
  data() {
    return {
      code: "",
      token: localStorage.getItem("token"),
    };
  },

  methods: {
    codeMetod() {
      axios.defaults.headers.common["Accept"] = "application/json";
      axios.defaults.headers.common["Authorization"] = this.token;
      axios
        .post("http://127.0.0.1:8000/api/verify", {
          code: this.code,
        })
        .then(function (response) {
          if (response.data.success) {
            Swal.fire({
              position: "top-end",
              icon: "success",
              title: "verifyed  has been success",
              showConfirmButton: false,
              timer: 1500,
            });
          }
          console.log(response.data);
        })
        .catch(function (error) {
          console.log(error);
        });
      return this.$router.push("/");
    },

    send() {
      axios.defaults.headers.common["Accept"] = "application/json";
      axios.defaults.headers.common["Authorization"] = this.token;
      axios
        .post("http://127.0.0.1:8000/api/send")
        .then(function (response) {
          console.log(response.data);
          if (response.data.success) {
            Swal.fire({
              position: "top-end",
              icon: "success",
              title: "sendcode has been success",
              showConfirmButton: false,
              timer: 1500,
            });
          }
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>
