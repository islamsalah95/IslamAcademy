<template>
  <div>
    <form action="" id="comment">
      <div>
        <div class="form-floating">
          <textarea
            v-model="comment"
            class="form-control"
            placeholder="Leave a comment here"
            id="floatingTextarea"
          ></textarea>
          <label for="floatingTextarea">Comments</label>
        </div>
        <div>
          <button @click="addComment()" type="button" class="btn btn-dark">
            send
          </button>
        </div>
      </div>
    </form>

    <div
      v-for="showComment in showComments"
      :key="showComment.id"
      id="comment"
      class="card border-dark"
    >
      <div class="card-header">
        {{ showComment.user_name }}
      </div>
      <div class="card-body">
        <p class="card-text">{{ showComment.comment }}.</p>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import Swal from "sweetalert2";

export default {
  props: ["commentId"],
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
    axios.defaults.headers.common["Authorization"] = this.token;
    axios
      .post(`http://127.0.0.1:8000/api/showComment`, {
        playlist_id: this.commentId,
      })
      .then(
        (response) => (this.showComments = response.data.data.Comments)

        // console.log(response.data.data.Comments)
        // (this.courses = response.data)
        // response=this.courses
      )
      .catch((error) => console.log(error));
  },
  methods: {
    async addComment() {
      //  console.log(this.commentId)

      axios.defaults.headers.common["Accept"] = "application/json";
      axios.defaults.headers.common["Authorization"] = this.token;
      axios
        .post(`http://127.0.0.1:8000/api/storeComment`, {
          comment: this.comment,
          playlist_id: this.commentId,
        })
        .then((response) => (this.comment = ""))
        .catch((error) => console.log(error));

      return await Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Your work has been saved",
        showConfirmButton: false,
        timer: 1500,
      });
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
