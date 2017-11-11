<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button @click="initAddTask()" class="btn btn-primary btn-xs pull-right">
                            + Add New Task
                        </button>
                        My Tasks
                    </div>

                    <div class="panel-body">
                        <table class="table table-bordered table-striped table-responsive" v-if="tasks.length > 0">
                            <tbody>
                            <tr>
                                <th>
                                    No.
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                            <tr v-for="(task, index) in tasks">
                                <td>{{ index + 1 }}</td>
                                <td>
                                    {{ task.name }}
                                </td>
                                <td>
                                    {{ task.description }}
                                </td>
                                <td>
                                    <button @click="initUpdate(index)" class="btn btn-success btn-xs">Edit</button>
                                    <button @click="deleteTask(index)" class="btn btn-danger btn-xs">Delete</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Application
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                                <label for="amount">Amount:</label>
                                <input required min="300" type="number" name="amount" id="amount" placeholder="Amount" class="form-control" v-model.number="application.amount">
                            </div>
                            <div class="form-group">
                                <label for="period">Period in months:</label>
                                <input required max="80" min="1" type="number" name="period" id="period" placeholder="Period" class="form-control" v-model.number="application.period">
                            </div>
                            <div class="form-group">
                                <label for="purpose">Purpose:</label>
                                <select required v-model="application.purpose" class="form-control" name="education" id="purpose">
                                    <option disabled value="">Please select one option</option>
                                    <option v-for="option in purposes" v-bind:value="option.id">
                                        {{ option.label }}
                                    </option>
                                </select>
                            </div>
                            <div class="panel-info">
                                Personal information
                            </div>
                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input required type="text" name="name" id="name" placeholder="Name" class="form-control" v-model="application.borrower.name">
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last name:</label>
                                <input required type="text" name="last_name" id="last_name" placeholder="Last name" class="form-control" v-model="application.borrower.last_name">
                            </div>
                            <div class="form-group">
                                <input type="radio" name="gender_female" id="gender_female" value="FEMALE" v-model="application.borrower.gender">
                                <label for="gender_female">Female</label>
                                <input type="radio" id="gender_male" value="MALE" v-model="application.borrower.gender">
                                <label for="gender_male">Male</label>
                            </div>
                            <div class="form-group">
                                <label for="birth_date">Birth date:</label>
                                <input required type="date" name="birth_date" id="birth_date" placeholder="Birth date" class="form-control" v-model.date="application.borrower.birth_date">
                            </div>
                            <div class="form-group">
                                <label for="birth_country">Birth country:</label>
                                <select required v-model="application.borrower.birth_country" class="form-control" name="birth_country" id="birth_country">
                                    <option disabled value="">Please select one option</option>
                                    <option v-for="option in countries" v-bind:value="option.code">
                                        {{ option.name }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="identity_document_code">Identity document code:</label>
                                <input type="text" name="identity_document_code" id="identity_document_code" placeholder="Identity document code"
                                       class="form-control" v-model="application.borrower.identity_document_code">
                            </div>
                            <div class="form-group">
                                <label for="identity_document_type">Identity document type:</label>
                                <select v-model="application.borrower.identity_document_type" class="form-control" name="identity_document_type" id="identity_document_type">
                                    <option disabled value="">Please select one option</option>
                                    <option v-for="option in identity_document_types" v-bind:value="option.id">
                                        {{ option.label }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="marital_status">Marital situation:</label>
                                <select required v-model="application.borrower.marital_status" class="form-control" name="marital_status" id="marital_status">
                                    <option disabled value="">Please select one option</option>
                                    <option v-for="option in marital_status" v-bind:value="option.id">
                                        {{ option.label }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="education">Education:</label>
                                <select required v-model="application.borrower.education" class="form-control" name="education" id="education">
                                    <option disabled value="">Please select one option</option>
                                    <option v-for="option in educations" v-bind:value="option.id">
                                        {{ option.label }}
                                    </option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="education">Email:</label>
                                <input type="email" name="email" id="email" placeholder="Email"
                                       class="form-control" v-model.email="application.borrower.email">
                            </div>
                            <div class="form-group">
                                <label for="mobile_phone">Mobile phone:</label>
                                <input type="text" name="mobile_phone" id="mobile_phone" placeholder="Mobile phone"
                                       class="form-control" v-model="application.borrower.mobile_phone">
                            </div>
                            <div class="form-group">
                                <label for="land_phone">Land phone:</label>
                                <input type="text" name="land_phone" id="land_phone" placeholder="Land phone"
                                       class="form-control" v-model="application.borrower.land_phone">
                            </div>
                            <div class="form-group">
                                <label for="dependants">Dependants:</label>
                                <input type="number" name="dependants" id="dependants" placeholder="Dependants"
                                       class="form-control" v-model="application.borrower.dependants">
                            </div>
                            <div class="form-group">
                                <label for="bank_account_number">Bank account:</label>
                                <input type="text" name="bank_account_number" id="bank_account_number" placeholder="Bank account"
                                       class="form-control" v-model="application.borrower.bank_account_number">
                            </div>
                            <div class="form-group">
                                <label for="bank_start_date">Bank account open date:</label>
                                <input type="date" name="bank_start_date" id="bank_start_date" placeholder="Bank account open date"
                                       class="form-control" v-model.date="application.borrower.bank_start_date">
                            </div>

                            <button type="button" @click="createApplication" class="btn btn-primary">Submit</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--<div class="modal fade" tabindex="-1" role="dialog" id="add_task_model">-->
            <!--<div class="modal-dialog" role="document">-->
                <!--<div class="modal-content">-->
                    <!--<div class="modal-header">-->
                        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span-->
                                <!--aria-hidden="true">&times;</span></button>-->
                        <!--<h4 class="modal-title">Add New Task</h4>-->
                    <!--</div>-->
                    <!--<div class="modal-body">-->

                        <!--<div class="alert alert-danger" v-if="errors.length > 0">-->
                            <!--<ul>-->
                                <!--<li v-for="error in errors">{{ error }}</li>-->
                            <!--</ul>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                            <!--<label for="name">Name:</label>-->
                            <!--<input type="text" name="name" id="name" placeholder="Task Name" class="form-control"-->
                                   <!--v-model="task.name">-->
                        <!--</div>-->
                        <!--<div class="form-group">-->
                            <!--<label for="description">Description:</label>-->
                            <!--<textarea name="description" id="description" cols="30" rows="5" class="form-control"-->
                                      <!--placeholder="Task Description" v-model="task.description"></textarea>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="modal-footer">-->
                        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                        <!--<button type="button" @click="createTask" class="btn btn-primary">Submit</button>-->
                    <!--</div>-->
                <!--</div>&lt;!&ndash; /.modal-content &ndash;&gt;-->
            <!--</div>&lt;!&ndash; /.modal-dialog &ndash;&gt;-->
        <!--</div>&lt;!&ndash; /.modal &ndash;&gt;-->

        <!--<div class="modal fade" tabindex="-1" role="dialog" id="update_task_model">-->
            <!--<div class="modal-dialog" role="document">-->
                <!--<div class="modal-content">-->
                    <!--<div class="modal-header">-->
                        <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span-->
                                <!--aria-hidden="true">&times;</span></button>-->
                        <!--<h4 class="modal-title">Update Task</h4>-->
                    <!--</div>-->
                    <!--<div class="modal-body">-->

                        <!--<div class="alert alert-danger" v-if="errors.length > 0">-->
                            <!--<ul>-->
                                <!--<li v-for="error in errors">{{ error }}</li>-->
                            <!--</ul>-->
                        <!--</div>-->

                        <!--<div class="form-group">-->
                            <!--<label>Name:</label>-->
                            <!--<input type="text" placeholder="Task Name" class="form-control"-->
                                   <!--v-model="update_task.name">-->
                        <!--</div>-->
                        <!--<div class="form-group">-->
                            <!--<label for="description">Description:</label>-->
                            <!--<textarea cols="30" rows="5" class="form-control"-->
                                      <!--placeholder="Task Description" v-model="update_task.description"></textarea>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="modal-footer">-->
                        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                        <!--<button type="button" @click="updateTask" class="btn btn-primary">Submit</button>-->
                    <!--</div>-->
                <!--</div>&lt;!&ndash; /.modal-content &ndash;&gt;-->
            <!--</div>&lt;!&ndash; /.modal-dialog &ndash;&gt;-->
        <!--</div>&lt;!&ndash; /.modal &ndash;&gt;-->

    </div>
</template>

<script>

    export default {
        data() {
            return {
                task: {
                    description: '',
                    name: '',
                },
                application: {
                    amount:'',
                    purpose:'',
                    period:'',
/*
"incomes": [
{
"type": "SALARY",
"net_monthly": "201050",
"annual_payments": "14"
}
],
"expenses": [
{
"type": "RENT",
"net_monthly": "45000",
"outstanding_amount": "245000"
}
],
"address": {
"residence_type": "RENT",
"start_date": "2010-10-10",
"street": "Balmes",
"street_type": "AVENUE",
"street_number": "125B",
"floor_door": "6th, 1B",
"city": "Barcelona",
"postal_code": "08008",
"county": "Barcelona",
"country_code": "ESP"
}*/
                    borrower:{
                        name: '',
                        last_name: '',
                        gender: '',
                        birth_date: '',
                        birth_country: '',
                        identity_document_code: '',
                        identity_document_type: '',
                        marital_status: '',
                        education: '',
                        email: '',
                        mobile_phone: '',
                        land_phone: '',
                        dependants: '',
                        bank_account_number: '',
                        bank_start_date: '',
                        employment: {
                            contract_type: '',
                            professional_activity: '',
                            professional_industry: '',
                            professional_sector: '',
                            start_date: ''
                        },
                        address: {
                            residence_type: '',
                            start_date: '',
                            street: '',
                            street_type: '',
                            street_number: '',
                            floor_door: '',
                            city: '',
                            postal_code: '',
                            county: '',
                            country_code: ''
                        }
                    },
                    coborrower:{
                        name: '',
                        surname: '',
                        gender: '',
                        birth_date: '',
                        birth_country: '',
                        identity_document_code: '',
                        identity_document_type: '',
                        education: '',
                        email: '',
                        mobile_phone: '',
                        land_phone: '',
                    },

                },
                marital_status: [],
                identity_document_types: [],
                countries: [],
                educations: [],
                purposes: [],
                errors: [],
                tasks: [],
                update_task: {}
            }
        },
        mounted() {
            this.readTasks();
            this.populateForm();
        },
        methods: {
            initAddTask() {
                $("#add_task_model").modal("show");
            },
            createApplication() {
                var application = {
                    amount: this.application.amount,
                    purpose: this.application.purpose,
                    period: this.application.period,
                    borrower: {
                        name: this.application.borrower.name,
                        last_name: this.application.borrower.last_name,
                        gender: this.application.borrower.gender,
                        birth_date: this.application.borrower.birth_date,
                        birth_country: this.application.borrower.birth_country,
                        identity_document_code: this.application.borrower.identity_document_code,
                        identity_document_type: this.application.borrower.identity_document_type,
                        marital_status: this.application.borrower.marital_status,
                        education: this.application.borrower.education,
                        email: this.application.borrower.email,
                        mobile_phone: this.application.borrower.mobile_phone,
                        land_phone: this.application.borrower.land_phone,
                        dependants: this.application.borrower.dependants,
                        bank_account_number: this.application.borrower.bank_account_number,
                        bank_start_date: this.application.borrower.bank_start_date,
                        employment: {
                            contract_type: this.application.borrower.employment.contract_type,
                            professional_activity: this.application.borrower.employment.professional_activity,
                            professional_industry: this.application.borrower.employment.professional_industry,
                            professional_sector: this.application.borrower.employment.professional_sector,
                            start_date: this.application.borrower.employment.start_date
                        },
                        address: {
                            residence_type: this.application.borrower.address.residence_type,
                            start_date: this.application.borrower.address.start_date,
                            street: this.application.borrower.address.street,
                            street_type: this.application.borrower.address.street_type,
                            street_number: this.application.borrower.address.street_number,
                            floor_door: this.application.borrower.address.floor_door,
                            city: this.application.borrower.address.city,
                            postal_code: this.application.borrower.address.postal_code,
                            county: this.application.borrower.address.county,
                            country_code: this.application.borrower.address.country_code
                        }
                    },
                    coborrower: {
                        name: this.application.coborrower.name,
                        gender: this.application.coborrower.gender,
                        surname: this.application.coborrower.surname,
                        birth_date: this.application.coborrower.birth_date,
                        birth_country: this.application.coborrower.birth_country,
                        identity_document_code: this.application.coborrower.identity_document_code,
                        identity_document_type: this.application.coborrower.identity_document_type,
                        education: this.application.coborrower.education,
                        email: this.application.coborrower.email,
                        mobile_phone: this.application.coborrower.mobile_phone,
                        land_phone: this.application.coborrower.land_phone,
                    }
                };
                axios.post('/api/v1/application', application)
                    .then(response => {
                        this.reset();
                        console(response);
//                        this.tasks.push(response.data.task);
//
//                        $("#add_task_model").modal("hide");

                    })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.name) {
                            this.errors.push(error.response.data.errors.name[0]);
                        }

                        if (error.response.data.errors.description) {
                            this.errors.push(error.response.data.errors.description[0]);
                        }
                    });
            },
            createTask() {
                axios.post('/task', {
                    name: this.task.name,
                    description: this.task.description,
                })
                    .then(response => {

                        this.reset();

                        this.tasks.push(response.data.task);

                        $("#add_task_model").modal("hide");

                    })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.name) {
                            this.errors.push(error.response.data.errors.name[0]);
                        }

                        if (error.response.data.errors.description) {
                            this.errors.push(error.response.data.errors.description[0]);
                        }
                    });
            },
            reset() {
                this.task.name = '';
                this.task.description = '';
            },
            readTasks() {
                axios.get('/task')
                    .then(response => {

                        this.tasks = response.data.tasks;

                    });
            },
            populateForm() {
                axios.get('api/v1/marital-status')
                    .then(response => {
                        this.marital_status = response.data;
                    });
                axios.get('api/v1/identity-document-type')
                    .then(response => {
                        this.identity_document_types = response.data;
                    });
                axios.get('api/v1/country')
                    .then(response => {
                        this.countries = response.data;
                    });
                axios.get('api/v1/education')
                    .then(response => {
                        this.educations = response.data;
                    });
                axios.get('api/v1/purpose')
                    .then(response => {
                        this.purposes = response.data;
                    });

            },
            initUpdate(index) {
                this.errors = [];
                $("#update_task_model").modal("show");
                this.update_task = this.tasks[index];
            },
            updateTask() {
                axios.patch('/task/' + this.update_task.id, {
                    name: this.update_task.name,
                    description: this.update_task.description,
                })
                    .then(response => {

                        $("#update_task_model").modal("hide");

                    })
                    .catch(error => {
                        this.errors = [];
                        if (error.response.data.errors.name) {
                            this.errors.push(error.response.data.errors.name[0]);
                        }

                        if (error.response.data.errors.description) {
                            this.errors.push(error.response.data.errors.description[0]);
                        }
                    });
            },
            deleteTask(index) {
                let conf = confirm("Do you ready want to delete this task?");
                if (conf === true) {

                    axios.delete('/task/' + this.tasks[index].id)
                        .then(response => {

                            this.tasks.splice(index, 1);

                        })
                        .catch(error => {

                        });
                }
            }
        }
    }
</script>