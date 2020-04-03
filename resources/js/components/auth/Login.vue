<template>
  <div id="page">
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
                <div class="error">{{ emailError }}</div>
              </div>
              <div class="row">
                <div class="label">
                  <span class="a right normal url">Forget your password?</span>Password
                </div>
                <div class="input">
                  <input type="password" placeholder="Your password" v-model="password" />
                </div>
                <div class="error">{{ passwordError }}</div>
              </div>
              <div class="row relative xo">
                <div class="checkbox">
                  <input type="checkbox" checked name="saved" /> &nbsp; Keep me
                  logged in
                </div>

                <button type="submit" class="submit">Login to start working</button>

                <div class="oauth">
                  <div class="label">
                    <span>Or, login via single sign-on</span>
                  </div>
                  <a class="oauth-login left" href="#">Login with Google</a>
                  <a class="oauth-login left" href="#">Login with Microsoft</a>
                  <a class="oauth-login right" href="#">Login with SAML</a>
                </div>
              </div>
            </div>

            <div class="extra xo">
              <div class="simple">
                <a class="a" href="#">Login with Guest/Clientaccess?</a>
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
  methods: {
    ...mapActions(["login"]),
    handleSubmitLogin() {
      const { email, password } = this;
      this.login({ email, password }).then(response => {
        if (response.error) {
          if (typeof response.message === "string") {
            this.$notify({
              group: 'notify',
              type: 'error',
              title: 'Error!',
              text: response.message
            });
          } else {
            this.emailError = response.message.email[0];
            this.passwordError = response.message.password[0];
          }
        } else {
          this.$router.push("/reports");
        }
      });
    }
  }
};
</script>

<style scoped>
  .error {
    margin-top: 5px;
    color: red
  }
</style>
