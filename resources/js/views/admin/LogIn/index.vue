<template>
  <div>
    <div class="sidenav">
      <div class="login-main-text">
        <h2>
          Visitor Log<br />
          Content Managament System
        </h2>
      </div>
    </div>
    <div class="main">
      <div class="col-md-6 col-sm-12">
        <div class="login-form">
          <div>
            <div class="form-group">
              <label>User Name</label>
              <input
                v-model="email"
                type="text"
                class="form-control"
                placeholder="User Name"
              />
            </div>
            <div class="form-group">
              <label>Password</label>
              <input
                type="password"
                class="form-control"
                placeholder="Password"
                v-model="password"
              />
            </div>
            <button
              @click="logIn()"
              type="submit"
              class="btn btn-black btn-block"
            >
              Login
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  created() {
    if (this.$session.has("admin") == true) {
      this.$router.push({ name: "admin-unit" });
    }
  },
  data: function () {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    logIn() {
      axios
        .post("/api/adminAuth", {
          email: this.email,
          password: this.password,
        })
        .then((response) => {
          let self = this;

          self.$session.set("admin", response.data);

          self.$router.push({ path: "/admin/unit" });
          
        })
        .catch((error) => {
          alert("Incorrect email or password!!!");
        });
    },
  },
};
</script>
<style>
body {
  font-family: "Lato", sans-serif;
}

.main-head {
  height: 150px;
  background: #fff;
}

.sidenav {
  height: 100%;
  background-color: #41b1ad;
  overflow-x: hidden;
  padding-top: 20px;
}

.main {
  padding: 0px 10px;
}

@media screen and (max-height: 450px) {
  .sidenav {
    padding-top: 15px;
  }
}

@media screen and (max-width: 450px) {
  .login-form {
    margin-top: 10%;
  }

  .register-form {
    margin-top: 10%;
  }
}

@media screen and (min-width: 768px) {
  .main {
    margin-left: 40%;
  }

  .sidenav {
    width: 40%;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
  }

  .login-form {
    margin-top: 40%;
  }

  .register-form {
    margin-top: 20%;
  }
}

.login-main-text {
  margin-top: 20%;
  padding: 60px;
  color: #fff;
}

.login-main-text h2 {
  font-weight: 300;
}

.btn-black {
  background-color: #000 !important;
  color: #fff;
}
</style>
