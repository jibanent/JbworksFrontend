<template>
  <div class="session-wrapper overlay">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7 col-sm-10 col-xs-12">
          <div class="logo-wrap text-center mb-50">
            <img src="/static/img/logo.png" alt="site-logo" width="300" height="92">
          </div>
          <div class="session-block d-block">
            <div class="text-center mb-30">
              <div class="mb-20">
                <img class="img-fluid rounded-circle" width="60" height="60" src="/static/img/user-1.jpg">
              </div>
              <h3 class="mb-20">
                {{ $t('auth.login') }}
              </h3>
              <span class="fs-12 d-block w-75 mx-auto">
                {{ $t('auth.enterUsernameAndPasswordToAccessControlPanelOfAdminify') }}
              </span>
            </div>
            <div class="form-wrapper">
              <b-form>
                <b-form-group id="exampleInputGroup1" label="E-mail ID" label-for="emailInput1">
                  <b-form-input id="emailInput1" v-model="credentials.email" type="email" required placeholder="Enter Your Email" />
                </b-form-group>
                <b-form-group id="exampleInputGroup2" label="Password" label-for="passwordInput1">
                  <b-form-input id="passwordInput1" v-model="credentials.password" type="password" required placeholder="Enter Your Password" />
                </b-form-group>
                <div class="d-flex justify-content-between align-items-center mb-15">
                  <b-form-group id="exampleGroup4" class="mb-0">
                    <b-form-checkbox value="me">
                      Remeber me
                    </b-form-checkbox>
                  </b-form-group>
                  <a href="javascript:;" class="text-danger text-center fs-12 d-block">
                    Forgot password
                  </a>
                </div>
                <b-button variant="primary" class="session-btn mb-15">
                  Login
                </b-button>
                <a href="javascript:void(0)" class="text-center fs-12 d-block text-success">
                  Don't have account
                </a>
              </b-form>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 d-flex justify-content-center align-items-center social-block">
          <div class="social-wrap">
            <h3 class="text-white mb-30">
              Or Login With
            </h3>
            <ul class="social-btn-wrap p-0 m-0 list-unstyled">
              <li class="list-item mb-20">
                <a target="_blank">
                  <span class="social-icon google">
                    <i class="zmdi zmdi-google-plus" />
                  </span>
                  <span class="fs-12 text-white">Login using Google+</span>
                </a>
              </li>
              <li class="list-item mb-20">
                <b-button variant="danger">
                  Signin With Auth0
                </b-button>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Login',
  data() {
    return {
      credentials: {
        email: '',
        password: ''
      },
      errors: null
    }
  }
}
</script>

<style></style>
