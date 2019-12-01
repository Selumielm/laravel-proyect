<template>
  <div>
    <h1>Login</h1>

    <div class="form-group">
      <label for="email">Correo</label>
      <input
        type="email"
        id="email"
        v-model="form.correo"
        class="form-control"
        placeholder="Correo"
      />
    </div>
    <div class="form-group">
      <label for="pass">Contraseña</label>
      <input
        type="password"
        class="form-control"
        id="pass"
        v-model="form.pass"
        placeholder="Contraseña"
      />
    </div>

    <div v-if="error" class="bg-danger p-3 text-white mb-3">
      <p class="m-0">Error, credenciales incorrectas</p>
    </div>

    <button type="button" v-on:click="login()" class="btn btn-primary">Inciar sesion</button>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Hello.");
  },

  data() {
    return {
      form: {
        correo: "abi@test.com",
        pass: "123456789"
      },
      error: false
    };
  },

  methods: {
    login() {
      console.log(this.form);
      const body = {
        email: this.form.correo,
        password: this.form.pass
      };

      fetch("http://localhost:8000/api/login", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(body)
      })
        .then(res => res.json())
        .then(res => {
          if (res.res) {
            this.$router.push("/beneficiarios");
          } else {
            this.error = true;
            setTimeout(() => (this.error = false), 2000);
          }
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>
