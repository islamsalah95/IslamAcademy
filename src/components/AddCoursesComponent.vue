<template>
  <div class="Contact">
    <main class="main-content">
      <div class="fullwidth-block inner-content">
        <div class="container">
          <h2 class="page-title" style="text-align: center">Add Course</h2>

          <div class="row justify-content-md-center">
            <div class="col-4">
              <form @submit.prevent="submitFile()" class="contact-form">
                <div style="text-align: center" class="mb-3 mt-3">
                  <label for="coach" class="form-label">coach:</label>
                  <input
                    v-model.trim.trim="coach"
                    type="text"
                    class="form-control"
                    id="coach"
                    name="coach"
                  />
                </div>

                <div style="text-align: center" class="mb-3">
                  <label for="title" class="form-label">title:</label>
                  <input
                    v-model.trim="title"
                    type="text"
                    class="form-control"
                    id="title"
                    name="title"
                  />
                </div>

                <div style="text-align: center" class="mb-3">
                  <label for="desc_en" class="form-label">descen:</label>
                  <input
                    v-model.trim="desc_en"
                    type="text"
                    class="form-control"
                    id="desc_en"
                    name="desc_en"
                  />
                </div>

                <div style="text-align: center" class="mb-3">
                  <label for="des_ar" class="form-label">desar:</label>
                  <input
                    v-model.trim="des_ar"
                    type="text"
                    class="form-control"
                    id="des_ar"
                    name="des_ar"
                  />
                </div>

                <div style="text-align: center" class="mb-3">
                  <label for="price" class="form-label">price:</label>
                  <input
                    v-model.trim="price"
                    type="text"
                    class="form-control"
                    id="price"
                    name="price"
                  />
                </div>

                <div style="text-align: center" class="mb-3">
                  <label for="file" class="form-label">file:</label>
                  <input
                    type="file"
                    id="file"
                    ref="file"
                    v-on:change="handleFileUpload()"
                    class="form-control"
                    name="file"
                  />
                </div>

                <div style="text-align: center" class="mb-3">
                  <input
                    v-on:click="submitFile()"
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
      coach: "",
      title: "",
      desc_en: "",
      des_ar: "",
      price: "",
      file: "",
      token: localStorage.getItem("token"),
    };
  },

  methods: {
    submitFile() {
      let form = new FormData();
      form.set("coach", this.coach);
      form.set("title", this.title);
      form.set("desc_en", this.desc_en);
      form.set("des_ar", this.des_ar);
      form.set("price", this.price);
      form.set("image", this.file);

      axios.defaults.headers.common["Accept"] = "application/json";
      axios.defaults.headers.common["Authorization"] = this.token;
      axios
        .post("http://127.0.0.1:8000/api/storeCoursrs", form)
        .then((response) => {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500,
          });
          return console.log(response.data);
        })
        .catch((error) => console.log(error));
    },
    handleFileUpload(e) {
      this.file = this.$refs.file.files[0];
    },
  },
};
</script>
