<template>
  <div>
    <div class="d-flex justify-content-end my-3">
      <a href="#/donaciones/nuevo" class="btn btn-primary">Agregar donación</a>
    </div>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre beneficiario</th>
          <th scope="col">cantidad</th>
          <th scope="col">Nombre donador</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="bene in lista" v-bind:key="bene.id">
          <th scope="row">{{ bene.id }}</th>
          <td>{{ bene.beneficiario.name }}</td>
          <td>{{ bene.cantidad }}</td>
          <td>{{ bene.donador_name }}</td>
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

    fetch("http://localhost:8000/api/donaciones")
      .then(res => res.json())
      .then(res => {
        console.log(res.data);
        this.cargando = false;
        this.lista = res.data;
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

