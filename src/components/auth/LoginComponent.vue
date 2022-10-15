<template>
  <div class="Contact">
    <main class="main-content">
      <div class="fullwidth-block inner-content">
        <div class="container">
          <h2 class="page-title" style="text-align: center">login</h2>

          <div class="row justify-content-md-center">
            <div class="col-4">
              <form @submit.prevent="loginin" class="contact-form">
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
                  <input
                    @click="loginin"
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
// import axios from 'axios';
export default {
  data() {
    return {
      email: "",
      password: "",
      // formIsValid: true,
    };
  },

  methods: {
    loginin() {
      this.$store.dispatch("login", {
        email: this.email,
        password: this.password,
      });
      window.location.reload()

     return this.$router.push("/");

    },
  },
};
</script>
