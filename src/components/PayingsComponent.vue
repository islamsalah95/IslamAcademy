<template>
  <div class="AllCourses">
    <main class="main-content">
      <div class="fullwidth-block download">
        <div class="container">
          <div class="row">
            <div
              v-for="showPayingCourse in showPayingCourses"
              :key="showPayingCourse.id"
              class="col-md-4"
            >
              <div class="item">
                <router-link :to="'/Blog/' + showPayingCourse.course_id">
                  <div class="image">
                    <figure>
                      <img :src="showPayingCourse.course_image" alt="error" />
                      <p>{{ showPayingCourse.image }}</p>
                    </figure>
                  </div>
                </router-link>

                <div>
                  <h3 class="item-title">
                    {{ showPayingCourse.course_title }}
                  </h3>
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
export default {
  name: "AllCourses",
  data() {
    return {
      showPayingCourses: "",
      imageSrce: "",
      token: localStorage.getItem("token"),
    };
  },
  mounted() {
    axios.defaults.headers.common["Accept"] = "application/json";
    axios.defaults.headers.common["Authorization"] = this.token;
    axios
      .get("http://127.0.0.1:8000/api/showPayingCourse")
      .then(
        (response) =>
          // this.courses = response.data.data
          //  console.log(response.data.data.showPayingCourse)
          (this.showPayingCourses = response.data.data.showPayingCourse)
        // response=this.courses
      )
      .catch((error) => console.log(error));
  },

  methods: {
    show(pic) {
      console.log(`.../assets/web/${pic}`);
      this.imageSrce = `.../assets/web/${pic}`;
      return this.imageSrce;
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
