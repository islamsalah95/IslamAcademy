<template>
  <div class="PlayLists">
    <div
      v-for="showPlaylistVideo in showPlaylistVideos"
      :key="showPlaylistVideo.id"
      class="post"
    >
      <div class="entry-date">
        <div class="date">{{ year(showPlaylistVideo.created_at) }}</div>
        <span class="month">{{ month(showPlaylistVideo.created_at) }}</span>
      </div>
      <video
        @mouseenter="increment(showPlaylistVideo.id)"
        width="900"
        height="400"
        controls
      >
        <source :src="showPlaylistVideo.video" type="video/mp4" />
      </video>
      <p>{{ showPlaylistVideo.content }}</p>
      <p class="text-primary">viewers {{ showPlaylistVideo.viewers }}</p>

      <comment-component :commentId="showPlaylistVideo.id"></comment-component>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import CommentComponent from "./CommentComponent.vue";

export default {
  props: ["palylistId"],
  components: {
    CommentComponent,
  },
  data() {
    return {
      showPlaylistVideos: "",
      token: localStorage.getItem('token'),
      comment: "",
      showComments: "",
    };
  },
  mounted() {
    axios.defaults.headers.common["Accept"] = "application/json";
    axios.defaults.headers.common["Authorization"] = this.isLogin;

    axios
      .get(`http://127.0.0.1:8000/api/showPlaylistVideos/${this.palylistId}`)
      .then(
        (response) =>
          // this.courses = response.data.data
          //  console.log(response.data.data);

          (this.showPlaylistVideos = response.data.data.showPlaylistVideos)

        // (this.courses = response.data)
        // response=this.courses
      )
      .catch((error) => console.log(error));

    axios
      .get(`http://127.0.0.1:8000/api/showComment`)
      .then(
        (response) =>
          // this.courses = response.data.data
          console.log(response.data.data)

        // this.showComments=response.data.data.showComment

        // (this.courses = response.data)
        // response=this.courses
      )
      .catch((error) => console.log(error));
  },

  methods: {
    year(year) {
      let word = year.split("-");
      let neWword = word[0].split("0");
      return neWword[1];
    },
    month(month) {
      let word = month.split("-");
      return word[1];
    },
    increment(viewerId) {
      axios.defaults.headers.common["Accept"] = "application/json";
      axios.defaults.headers.common["Authorization"] = this.token;
      axios
        .post(`http://127.0.0.1:8000/api/ViewInc`, { id: viewerId })
        .then((response) => console.log(response.data))
        .catch((error) => console.log(error));
    },
  },computed:{
    isLogin(){
  return this.$store.getters.isAuth ;
},
  }
};
</script>
<style scoped>
#comment {
  color: black;
  background-color: dimgray;
  margin-bottom: 25px;
}
</style>
