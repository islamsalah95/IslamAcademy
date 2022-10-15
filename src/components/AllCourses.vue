<template>
  <div class="AllCourses">
    <main class="main-content">
      <div class="fullwidth-block download">
        <div class="container">
          <div class="row">
            <div v-for="course in courses" :key="course.id" class="col-md-4">
              <div class="item">
                <div>
                  <h3 class="item-title">{{ course.id }}</h3>
                  <h3 class="item-title">{{ course.title }}</h3>
                </div>

                <div class="image">
                  <a href="">
                    <figure>
                      <img :src="course.image" alt="error" />
                    </figure>
                  </a>
                </div>
                <div class="buttns">
                  <a
                    @click="setcartId(course.id)"
                    href="#"
                    class="button small primary"
                    >cart</a
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
  name: "AllCourses",
  data() {
    return {
      courses: null,
      imageSrce: "",
      cartId: "",
      error: false,
      token: localStorage.getItem("token"),
    };
  },
  mounted() {
    axios.defaults.headers.common["Accept"] = "application/json";
    axios
      .get("http://127.0.0.1:8000/api/showAllCourses")
      .then((response) => (this.courses = response.data.data.showAllCourses))
      .catch((error) => console.log(error));
  },

  methods: {
    show(pic) {
      console.log(`.../assets/web/${pic}`);
      this.imageSrce = `.../assets/web/${pic}`;
      return this.imageSrce;
    },
    setcartId(id) {
      this.cartId = id;
      return this.storeCart();
    },

    storeCart() {
      axios.defaults.headers.common["Authorization"] = this.token;
      axios.defaults.headers.common["Accept"] = "application/json";
      axios
        .post(`http://127.0.0.1:8000/api/store/${this.cartId}`)
        .then((response) => {
          if (!response.data.success) {
            console.log("error");
          } else {
            Swal.fire({
              position: "top-end",
              icon: "success",
              title: "Your work has been saved",
              showConfirmButton: false,
              timer: 1500,
            });
            this.error = true;
            return this.$router.push("/CartView");
          }

          // if (!response.data.success) {
          //   {
          //  return Swal.fire({
          //   icon: 'error',
          //   title: 'Oops...',
          //   text: 'you have paied this course!',
          //   footer: '<a href="">Why do I have this issue?</a>'
          // }) }}
        })
        .catch((error) => console.log(error));
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
</style>
