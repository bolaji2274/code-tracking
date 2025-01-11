<template>
  <div>
    <div class="h-full pb-4">
      <!-- <Nav /> -->
    </div>
    <section class="vh-70 bg-img">
      <div class="container py-5 h-100 d-flex justify-content-center align-items-center">
        <div class="card register-card" style="border-radius: 1rem">
          <div class="row g-0">
            <div class="col-md-12 d-flex align-items-center">
              <div class="card-body p-4 text-black">
                <form @submit.prevent="handleSubmit">
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219" />
                    <span class="h2 fw-bold mb-0">
                      Welcome to <b>Nasfarm 👋</b>
                    </span>
                  </div>
                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px">
                    Sign Up
                  </h5>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="first_name">First Name</label>
                    <input
                      type="text"
                      id="first_name"
                      class="form-control form-control-lg"
                      v-model="firstName"
                    />
                    <p v-if="errors.first_name" class="text-danger">
                      {{ errors.first_name }}
                    </p>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="last_name">Last Name</label>
                    <input
                      type="text"
                      id="last_name"
                      class="form-control form-control-lg"
                      v-model="lastName"
                    />
                    <p v-if="errors.last_name" class="text-danger">
                      {{ errors.last_name }}
                    </p>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email Address</label>
                    <input
                      type="email"
                      id="email"
                      class="form-control form-control-lg"
                      v-model="email"
                    />
                    <p v-if="errors.email" class="text-danger">
                      {{ errors.email }}
                    </p>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="farm_branch_name">Address</label>
                    <input
                      type="text"
                      id="farm_branch_name"
                      class="form-control form-control-lg"
                      v-model="farmBranchName"
                    />
                    <p v-if="errors.farm_branch_name" class="text-danger">
                      {{ errors.farm_branch_name }}
                    </p>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="phone_number">Phone Number</label>
                    <div class="input-group">
                      <span class="input-group-text">+234</span>
                      <input
                        type="text"
                        id="phone_number"
                        class="form-control form-control-lg"
                        v-model="phoneNumber"
                        @input="handlePhoneChange"
                        placeholder="Enter your phone number"
                      />
                    </div>
                    <p v-if="errors.phone_number" class="text-danger">
                      {{ errors.phone_number }}
                    </p>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <div class="input-group">
                      <input
                        :type="showPassword ? 'text' : 'password'"
                        id="password"
                        class="form-control form-control-lg"
                        v-model="password"
                      />
                      <button
                        type="button"
                        class="btn btn-outline-secondary"
                        @click="toggleShowPassword"
                      >
                        <component :is="showPassword ? 'EyeOff' : 'Eye'" />
                      </button>
                    </div>
                    <p v-if="errors.password" class="text-danger">
                      {{ errors.password }}
                    </p>
                  </div>

                  <div class="form-outline mb-4">
                    <label class="form-label" for="password2">Confirm Password</label>
                    <div class="input-group">
                      <input
                        :type="showPassword ? 'text' : 'password'"
                        id="password2"
                        class="form-control form-control-lg"
                        v-model="password2"
                      />
                      <button
                        type="button"
                        class="btn btn-outline-secondary"
                        @click="toggleShowPassword"
                      >
                        <component :is="showPassword ? 'EyeOff' : 'Eye'" />
                      </button>
                    </div>
                    <p v-if="errors.password2" class="text-danger">
                      {{ errors.password2 }}
                    </p>
                  </div>

                  <div class="d-flex justify-content-center mt-4 mb-4">

                    <!-- <Loading v-if="loading" /> -->

                  </div>

                  <div class="pt-1 mb-4 d-flex justify-content-center">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">
                      Register
                    </button>
                  </div>

                  <p class="small text-muted mb-5">
                    Already have an account?
                    <router-link
                      to="/login"
                      style="color: #393f81; margin-left: 10px"
                      >Sign in here</router-link
                    >
                  </p>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="bg-light text-center text-lg-start">
      <div
        class="text-center p-3"
        style="background-color: rgba(0, 0, 0, 0.2)"
      >
        © 2024 - till date Copyright:
        <a class="text-dark" href="https://github.com/bolaji2274/">@ Bolaji Dev</a>
      </div>
    </footer>
  </div>
</template>

<script>
import { ref, inject } from "vue";
// import Nav from "../Nav.vue";
// import Loading from "../../context/Loading.vue";
import { Eye, EyeOff } from "lucide-vue-next"; // Lucide Vue Icons

export default {
  components: { 
    // Nav, 
    // Loading, 
    Eye, 
    EyeOff 
    },
  setup() {
    const firstName = ref("");
    const lastName = ref("");
    const farmBranchName = ref("");
    const email = ref("");
    const phoneNumber = ref("");
    const password = ref("");
    const password2 = ref("");
    const loading = ref(false);
    const showPassword = ref(false);

    const { registerUser, errors, clearErrors } = inject("AuthContext");

    const handleSubmit = async () => {
      loading.value = true;
      clearErrors();

      try {
        await registerUser(
          firstName.value,
          lastName.value,
          farmBranchName.value,
          email.value,
          phoneNumber.value,
          password.value,
          password2.value
        );
      } catch (error) {
        console.error("Registration error:", error);
      } finally {
        loading.value = false;
      }
    };

    const handlePhoneChange = (e) => {
      const phoneValue = e.target.value;
      if (phoneValue.startsWith("0")) {
        phoneNumber.value = "234" + phoneValue.slice(1);
      } else {
        phoneNumber.value = "234" + phoneValue;
      }
    };

    const toggleShowPassword = () => {
      showPassword.value = !showPassword.value;
    };

    return {
      firstName,
      lastName,
      farmBranchName,
      email,
      phoneNumber,
      password,
      password2,
      loading,
      showPassword,
      handleSubmit,
      handlePhoneChange,
      toggleShowPassword,
      errors,
    };
  },
};
</script>

<style scoped>
.bg-img {
  background-color: #9A616D;
  display: flex;
  align-items: center;
  justify-content: center;
  min-height: 100vh;
}

.register-card {
  max-width: 500px;
  width: 100%;
  margin: 0 auto;
  box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
}

@media (min-width: 768px) {
  .register-card {
    padding: 20px;
  }
}

</style>