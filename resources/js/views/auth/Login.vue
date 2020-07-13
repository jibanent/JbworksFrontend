<template>
  <div id="page" class="login-page">
    <div id="auth" class="scrollable">
      <div class="box-wrap">
        <div class="auth-logo">
          <a href="#">
            <img src="/templates/images/logo.full.png" />
          </a>
        </div>
        <div class="box">
          <form action="#" v-on:submit.prevent="handleSubmitLogin">
            <h1>Login</h1>
            <div class="auth-sub-title">Welcome back. Login to start working.</div>

            <div class="form">
              <div class="row">
                <div class="label">Email</div>
                <div class="input">
                  <input type="text" placeholder="Your email" v-model="email" />
                </div>
                <div class="validate-error">{{ emailError }}</div>
              </div>
              <div class="row">
                <div class="label">
                  <span class="a right normal url">Forget your password?</span>Password
                </div>
                <div class="input">
                  <input type="password" placeholder="Your password" v-model="password" />
                </div>
                <div class="validate-error">{{ passwordError }}</div>
              </div>
              <div class="row relative xo">
                <div class="checkbox">
                  <input type="checkbox" checked name="saved" /> &nbsp; Keep me
                  logged in
                </div>
                <button type="submit" class="submit">Login to start working</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";
import { message } from "../../helpers";
export default {
  name: "login",
  data() {
    return {
      email: "",
      password: "",
      emailError: "",
      passwordError: ""
    };
  },
  created() {
    const element = document.body;
    element.classList.add("screen-full");
  },
  methods: {
    ...mapActions(["login"]),
    handleSubmitLogin() {
      const { email, password } = this;
      this.login({ email, password }).then(response => {
        if (response.error) {
          if (typeof response.message === "string") {
            this.$notify(
              message("error", this.$t(`messages.${response.message}`))
            );
          } else {
            this.emailError = response.message.email[0];
            this.passwordError = response.message.password[0];
          }
        } else {
          if (this.$auth.isAdmin()) {
            this.$router.push("/reports");
          } else if (this.$auth.isLeader()) {
            this.$router.push("/projects");
          } else {
            this.$router.push("/tasks");
          }
        }
      });
    }
  }
};
</script>

<style>
.login-page:after {
  position: absolute;
  left: 600px;
  right: 0px;
  top: 0px;
  bottom: 0px;
  content: "";
  background-image: url("/assets/images/background.png");
  background-position: right bottom;
  background-repeat: repeat-x;
  background-size: cover;
}
</style>
