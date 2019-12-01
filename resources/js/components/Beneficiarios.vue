<template>
  <div>
     <div class="d-flex justify-content-end my-3">
      <a href="#/beneficiarios/nuevo" class="btn btn-primary">Agregar beneficiario</a>
    </div>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Correo</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="bene in lista" v-bind:key="bene.id">
          <th scope="row">{{ bene.id }}</th>
          <td>{{ bene.name }}</td>
          <td>{{ bene.email }}</td>
        </tr>
      </tbody>
    </table>

    <div v-if="cargando">Cargando...</div>
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
        this.lista = res.data;
        this.cargando = false;
      })
      .catch(err => {
        console.log(err);
      });
  },

  data() {
    return {
      cargando: true,
      lista: [],
      error: false
    };
  }
};
</script>

