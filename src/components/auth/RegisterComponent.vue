<template>
  <div class="Contact">
    <main class="main-content">
      <div class="fullwidth-block inner-content">
        <div class="container">
          <h2 class="page-title" style="text-align: center">Register</h2>

          <div class="row justify-content-md-center">
            <div class="col-4">
              <form @submit.prevent="register" class="contact-form">
                <div style="text-align: center" class="mb-3 mt-3">
                  <label for="name" class="form-label">Name:</label>
                  <input
                    v-model.trim="name"
                    type="name"
                    class="form-control"
                    id="name"
                    placeholder="Enter name"
                    name="name"
                  />
                </div>

                <div style="text-align: center" class="mb-3 mt-3">
                  <label for="email" class="form-label">Email:</label>
                  <input
                    v-model.trim="email"
                    type="email"
                    class="form-control"
                    id="email"
                    placeholder="Enter email"
                    name="email"
                  />
                </div>

                <div style="text-align: center" class="mb-3">
                  <label for="password" class="form-label">Password:</label>
                  <input
                    v-model.trim="password"
                    type="password"
                    class="form-control"
                    id="password"
                    placeholder="Enter password"
                    name="password"
                  />
                </div>

                <div style="text-align: center" class="mb-3">
                  <label for="password_confirmation" class="form-label"
                    >Password confirmation</label
                  >
                  <input
                    v-model.trim="password_confirmation"
                    type="password"
                    class="form-control"
                    id="password_confirmation"
                    placeholder="Enter password confirmation"
                    name="password_confirmation"
                  />
                </div>

                <div style="text-align: center" class="mb-3">
                  <input
                    @click="register"
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
    </main>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";
export default {
  data() {
    return {
      name: "",
      email: "",
      password: "",
      password_confirmation: "",
      token: this.$store.state.token,
    };
  },

  methods: {
    send() {
      axios.defaults.headers.common["Accept"] = "application/json";
      axios.defaults.headers.common["Authorization"] = this.token;
      axios
        .post("http://127.0.0.1:8000/api/send")
        .then(function (response) {
          if (response.data.success) {
            Swal.fire({
              position: "top-end",
              icon: "success",
              title: "sendcode has been success",
              showConfirmButton: false,
              timer: 1500,
            });
          }
          console.log(response.data);
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    register() {
      //     axios.defaults.headers.common['Content-Type']  ='application/json';
      //     axios.post('http://127.0.0.1:8000/api/register',{
      //     name:this.name,
      //     email:this.email,
      //     password:this.password,
      //     password_confirmation:this.password_confirmation,
      // }

      // )
      // .then(function (response) {
      //   localStorage.setItem('token',response.data.data.user.token)
      // })
      // .catch(function (error) {
      //   console.log(error);
      // });

      // return this.send();

      // // return this.$router.push("/VerifyComponent");
      this.$store.dispatch("signUp", {
        name: this.name,
        email: this.email,
        password: this.password,
        password_confirmation: this.password_confirmation,
      });
    },
  },
};
</script>
