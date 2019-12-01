<template>
  <div>
    <h1>Donación</h1>

    <div class="form-group">
      <label for="beneficiario">Beneficiario</label>
      <select class="form-control" id="beneficiario" v-model="form.beneficiario_id">
        <option v-for="b in bene_lista" v-bind:key="b.id" :value="b.id">{{ b.name }}</option>
      </select>
    </div>

    <div class="form-group">
      <label for="cantidad">Cantidad</label>
      <input
        type="number"
        id="cantidad"
        v-model="form.cantidad"
        class="form-control"
        placeholder="Cantidad"
      />
    </div>

    <div class="form-group">
      <label for="donador">Donador</label>
      <input
        type="text"
        class="form-control"
        id="donador"
        v-model="form.donador_name"
        placeholder="Donador"
      />
    </div>

    <div v-if="error" class="bg-danger p-3 text-white mb-3">
      <p class="m-0">Error</p>
    </div>

    <button type="button" v-on:click="create()" class="btn btn-primary">Guardar</button>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");

    fetch("http://localhost:8000/api/beneficiarios")
      .then(res => res.json())
      .then(res => {
        console.log(res.data);
        this.bene_lista = res.data;
        this.cargando = false;
      })
      .catch(err => {
        console.log(err);
      });
  },

  data() {
    return {
      form: {
        beneficiario_id: null,
        cantidad: 50,
        donador_name: "Default"
      },
      bene_lista: [],
      error: false
    };
  },

  methods: {
    create() {
      console.log(this.form);
      //   const body = {
      //     email: this.form.correo,
      //     password: this.form.pass
      //   };

      fetch("http://localhost:8000/api/donaciones", {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(this.form)
      })
        .then(res => res.json())
        .then(res => {
          console.log(res);
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>
