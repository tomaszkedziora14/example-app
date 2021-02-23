<template>
  <form @submit.stop.prevent="generatePDF">
    <div>
    <label class="typo__label">Groups</label>
        <multiselect v-model="value" :options="options" :multiple="true" group-values="libs" group-label="title" :group-select="true" placeholder="Type to search" track-by="name" label="name"><span slot="noResult">Oops! No elements found. Consider changing the search query.</span></multiselect>
    <pre class="language-json"><code>{{ value  }}</code></pre>
    </div>
      <p>
          <input type="submit" value="Submit" class="button">
      </p>
      </form>
</template>

<script>
import Multiselect from 'vue-multiselect'

export default {
components: {
  Multiselect
},
data () {
  return {
    options: [],
    value: []
  }
},
created() {
  this.getDoc();
  this.generatePDF();
},
  methods: {
    getDoc() {
      axios.get('/doc').then((response) => {
        this.options = response.data;
        console.log(options);
      }).catch((err) => {})
    },
    generatePDF(){
      const doc = { body: this.value};
      axios.post('/generate-pdf', doc)
        .then(response => 'ok');
    }
  },
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
