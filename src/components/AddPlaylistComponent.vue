<template>
  <div class="Contact">
    <main class="main-content">
      <div class="fullwidth-block inner-content">
        <div class="container">
          <h2 class="page-title" style="text-align: center">Add Course</h2>
          <div v-if="isLoading">
            <BaseSpinner></BaseSpinner>
        </div>
          <div class="row justify-content-md-center">
            <div class="col-4">
              <form @submit.prevent="submitFile()" class="contact-form">
                <div style="text-align: center" class="mb-3 mt-3">
                  <label for="file" class="form-label">courses:</label>

                  <div>
                    <select v-model="selected">
                      <option disabled value="">Please select one</option>
                      <option
                        v-for="course in courses"
                        :key="course.id"
                        v-bind:value="course.id"
                      >
                        {{ course.title }}
                      </option>
                    </select>
                  </div>
                </div>

                <div style="text-align: center" class="mb-3">
                  <label for="content" class="form-label">content:</label>
                  <input
                    v-model.trim="content"
                    type="text"
                    class="form-control"
                    id="content"
                    name="content"
                  />
                </div>

                <div style="text-align: center" class="mb-3">
                  <label for="file" class="form-label">video:</label>
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
import BaseSpinner from './BaseSpinner.vue'

export default {
  components:{
    BaseSpinner
  },
  data() {
    return {
      selected: "",
      file: "",
      viewers: 0,
      content: "",
      token: localStorage.getItem("token"),
      courses: "",
      isLoading:false

    };
  },

  methods: {
   async submitFile() {
      this.isLoading=true

      let form = new FormData();
      form.set("course_id", this.selected);
      form.set("video", this.file);
      form.set("viewers", this.viewers);
      form.set("content", this.content);

      axios.defaults.headers.common["Accept"] = "application/json";
      axios.defaults.headers.common["Authorization"] = this.token;
     await axios
        .post("http://127.0.0.1:8000/api/storePlaylist", form)
        .then((response) => {
          Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Your work has been saved",
            showConfirmButton: false,
            timer: 1500,
          });
          return console.log(response);
        })
        .catch((error) => console.log(error)); 
        this.isLoading=false   
      },
    handleFileUpload(e) {
      this.file = this.$refs.file.files[0];
    },
  },

  mounted() {
    axios.defaults.headers.common["Accept"] = "application/json";
    axios
      .get("http://127.0.0.1:8000/api/showAllCourses")
      .then((response) => (this.courses = response.data.data.showAllCourses))
      .catch((error) => console.log(error));
  },
};
</script>
