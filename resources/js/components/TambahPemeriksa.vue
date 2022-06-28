<template>
    <div class="card-body">
        <form>
            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">
                    NRP
                </label>
                <div class="col-lg-10">
                    <div class="input-group">
                        <input type="text" class="form-control" v-model="nrp">
                        <div class="input-group-append" style="cursor: pointer">
                            <span class="input-group-text btn-lims-gradient" id="basic-addon2">
                                <i class="fas fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">
                    Nama
                </label>
                <div class="col-lg-10">
                    <input v-model="nama"
                           type="text"
                           name="no_hp"
                           id="no_hp"
                           class="form-control"
                           minlength="5" maxlength="20">
                    <small id="helper-no_hp" class="form-text text-danger"></small>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-lg-2 col-form-label text-lg-right">
                    Unit Kerja
                </label>
                <div class="col-lg-10">
                    <select v-model="unitKerja" class="form-control">
                        <option value="" disabled selected>Pilih Unit Kerja</option>
                        <option value="Puslabfor">Puslabfor</option>
                        <option value="Labfor A">Labfor A</option>
                        <option value="Labfor B">Labfor B</option>
                    </select>
                    <small id="helper-jenis-identitas" class="form-text text-danger"></small>
                </div>
            </div>

        </form>
        <div class="d-flex justify-content-end mb-5">
            <button v-if="pemeriksa.length > 0"
                    class="btn btn-lims-gradient align-content-center ml-2"
                    data-toggle="modal" data-target="#modalsukses">
                Lanjutkan Proses
            </button>
            <button class="btn btn-secondary text-white d-flex align-content-center ml-2" @click="addPemeriksa">
                Tambah Pemeriksa
            </button>
        </div>
        <div class="overflow-hidden">
            <table class="table table table-bordered">
                <thead class="bg-success text-white">
                <tr>
                    <th>NRP</th>
                    <th>Nama</th>
                    <th>Unit Kerja</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody class="bg-light">

                <tr v-for="(data, index) in pemeriksa" v-bind:key="index">
                    <td width="10%">{{ data.nrp }}</td>
                    <td>{{ data.nama }}</td>
                    <td width="30%">{{ data.unitKerja }}</td>
                    <td width="10%" class="text-center">
                        <button @click="hapusPemeriksa(data)"
                                type="button"
                                class="btn btn-sm btn-primary">
                            hapus
                        </button>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
    export default {
        name: "TambahPemeriksa",
        data() {
            return {
                nrp: null,
                nama: null,
                unitKerja: null,
                pemeriksa: []
            }
        },
        methods: {
            addPemeriksa() {
                this.pemeriksa.push({
                    nrp: this.nrp,
                    nama: this.nama,
                    unitKerja: this.unitKerja
                });
                this.nrp = "";
                this.nama = "";
                this.unitKerja = "";
            },
            hapusPemeriksa(param) {
                this.pemeriksa = this.pemeriksa.filter(todo => {
                    return todo !== param
                });
            }
        }
    }
</script>

<style scoped>

</style>
