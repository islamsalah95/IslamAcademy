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
        <source src="../assets/web/video.mp4" type="video/mp4" />
      </video>
      <h1>{{ showPlaylistVideo.video }}</h1>
      <p>{{ showPlaylistVideo.content }}</p>
      <p class="text-primary">viewers {{ showPlaylistVideo.viewers }}</p>

      <CommentComponent></CommentComponent>

      <div id="comment" class="card border-dark">
        <div class="card-header">Featured</div>
        <div class="card-body">
          <p class="card-text">
            comment supporting text below as a natural lead-in to additional
            content.
          </p>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import CommentComponent from "../components/CommentComponent.vue";

export default {
  props: ["palylistId"],
  comments: {
    CommentComponent,
  },

  data() {
    return {
      showPlaylistVideos: "",
      token: this.$store.state.token,
      comment: "",
      showComments: "",
    };
  },
  mounted() {
    axios.defaults.headers.common["Accept"] = "application/json";
    axios.defaults.headers.common["Authorization"] = this.token;

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
    addComment(playlist_id) {
      axios.defaults.headers.common["Accept"] = "application/json";
      axios.defaults.headers.common["Authorization"] = this.token;
      axios
        .post(`http://127.0.0.1:8000/api/storeComment`, {
          comment: this.comment,
          playlist_id: playlist_id,
        })
        .then((response) => console.log(response.data))
        .catch((error) => console.log(error));
    },
  },
};
</script>
<style scoped>
#comment {
  color: black;
  background-color: dimgray;
  margin-bottom: 25px;
}
</style>
