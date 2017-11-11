<template>
    <div class="container">
        <form-wizard @on-complete="createApplication" :start-index="1" color="#3097D1">
            <h2 slot="title">Application</h2>
            <tab-content title="What do you need?" icon="ti-user">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <!--<div class="panel-heading">-->
                                <!--Application-->
                            <!--</div>-->
                            <div class="panel-body">
                                <div class="form-group col-md-4">
                                    <label for="amount">Amount:</label>
                                    <input required min="300" type="number" name="amount" id="amount" placeholder="Amount" class="form-control" v-model.number="application.amount">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="purpose">Purpose:</label>
                                    <select required v-model="application.purpose" class="form-control" name="education" id="purpose">
                                        <option disabled value="">Please select one option</option>
                                        <option v-for="option in purposes" v-bind:value="option.id">
                                            {{ option.label }}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="period">Period in months:</label>
                                    <input required max="80" min="1" type="number" name="period" id="period" placeholder="Period" class="form-control" v-model.number="application.period">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </tab-content>
            <tab-content title="Personal details" icon="ti-settings">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="name">Name:</label>
                                    <input required type="text" name="name" id="name" placeholder="Name" class="form-control" v-model="application.borrower.name">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="last_name">Last name:</label>
                                    <input required type="text" name="last_name" id="last_name" placeholder="Last name" class="form-control" v-model="application.borrower.last_name">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-2">
                                    <label for="birth_date">Birth date:</label>
                                    <input required type="date" name="birth_date" id="birth_date" placeholder="Birth date" class="form-control" v-model.date="application.borrower.birth_date">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="birth_country">Birth country:</label>
                                    <select required v-model="application.borrower.birth_country" class="form-control" name="birth_country" id="birth_country">
                                        <option disabled value="">Please select one option</option>
                                        <option v-for="option in countries" v-bind:value="option.code">
                                            {{ option.name }}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <p><label for="gender_female">Gender:</label></p>
                                    <input type="radio" name="gender_female" id="gender_female" value="FEMALE" v-model="application.borrower.gender">
                                    <label for="gender_female">Female</label>
                                    <input type="radio" id="gender_male" value="MALE" v-model="application.borrower.gender">
                                    <label for="gender_male">Male</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="identity_document_code">Identity document code:</label>
                                    <input type="text" name="identity_document_code" id="identity_document_code" placeholder="Identity document code"
                                           class="form-control" v-model="application.borrower.identity_document_code">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="identity_document_type">Identity document type:</label>
                                    <select required v-model="application.borrower.identity_document_type" class="form-control" name="identity_document_type" id="identity_document_type">
                                        <option disabled value="">Please select one option</option>
                                        <option v-for="option in identity_document_types" v-bind:value="option.id">
                                            {{ option.label }}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="marital_status">Marital situation:</label>
                                    <select required v-model="application.borrower.marital_status" class="form-control" name="marital_status" id="marital_status">
                                        <option disabled value="">Please select one option</option>
                                        <option v-for="option in marital_status" v-bind:value="option.id">
                                            {{ option.label }}
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="education">Education:</label>
                                    <select required v-model="application.borrower.education" class="form-control" name="education" id="education">
                                        <option disabled value="">Please select one option</option>
                                        <option v-for="option in educations" v-bind:value="option.id">
                                            {{ option.label }}
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="dependants">Dependants:</label>
                                    <input type="number" name="dependants" id="dependants" placeholder="Dependants"
                                           class="form-control" v-model="application.borrower.dependants">
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </tab-content>
            <tab-content title="Contact details" icon="ti-check">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="email">Email:</label>
                                        <input required type="email" name="email" id="email" placeholder="Email"
                                               class="form-control" v-model.email="application.borrower.email">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="mobile_phone">Mobile phone:</label>
                                        <input required type="text" name="mobile_phone" id="mobile_phone" placeholder="Mobile phone"
                                               class="form-control" v-model="application.borrower.mobile_phone">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="land_phone">Land phone:</label>
                                        <input type="text" name="land_phone" id="land_phone" placeholder="Land phone"
                                               class="form-control" v-model="application.borrower.land_phone">
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label for="purpose">Street type:</label>
                                        <select required v-model="application.borrower.address.street_type"
                                                class="form-control" name="street_type" id="street_type">
                                            <option disabled value="">Please select one option</option>
                                            <option v-for="option in street_types" v-bind:value="option.id">
                                                {{ option.label }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="street">Street:</label>
                                        <input type="text" name="street" id="street" placeholder="Street"
                                               class="form-control" v-model="application.borrower.address.street">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="street">Number:</label>
                                        <input type="text" name="street_number" id="street_number" placeholder="Number"
                                               class="form-control" v-model="application.borrower.address.street_number">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="street">Floor & door:</label>
                                        <input type="text" name="floor_door" id="floor_door" placeholder="Floor & door"
                                               class="form-control" v-model="application.borrower.address.floor_door">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="street">City:</label>
                                        <input type="text" name="city" id="city" placeholder="City"
                                               class="form-control" v-model="application.borrower.address.city">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="street">Postal code:</label>
                                        <input type="text" name="postal_code" id="postal_code" placeholder="postal_code"
                                               class="form-control" v-model="application.borrower.address.postal_code">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="street">County:</label>
                                        <input type="text" name="county" id="county" placeholder="county"
                                               class="form-control" v-model="application.borrower.address.county">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="birth_country">Country:</label>
                                        <select required v-model="application.borrower.address.country" class="form-control" name="birth_country" id="birth_country">
                                            <option disabled value="">Please select one option</option>
                                            <option v-for="option in countries" v-bind:value="option.code">
                                                {{ option.name }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="residence_type">Current situation:</label>
                                        <select required v-model="application.borrower.address.residence_type"
                                                class="form-control" name="residence_type" id="residence_type">
                                            <option disabled value="">Please select one option</option>
                                            <option v-for="option in residence_types" v-bind:value="option.id">
                                                {{ option.label }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="bank_start_date">Residence start date:</label>
                                        <input type="date" name="bank_start_date" id="start_date" placeholder="Since when do you live in your current residence?"
                                               class="form-control" v-model.date="application.borrower.address.start_date">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="bank_start_date">Bank account open date:</label>
                                        <input type="date" name="bank_start_date" id="bank_start_date" placeholder="Bank account open date"
                                               class="form-control" v-model.date="application.borrower.bank_start_date">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="bank_account_number">Bank account:</label>
                                        <input type="text" name="bank_account_number" id="bank_account_number" placeholder="Bank account"
                                               class="form-control" v-model="application.borrower.bank_account_number">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </tab-content>
            <tab-content title="Employment details" icon="ti-check">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="start_date">Start date:</label>
                                        <input type="date" name="employment_start_date" id="employment_start_date" placeholder="Start date"
                                               class="form-control" v-model="application.borrower.employment.start_date">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="contract_type">Contract type:</label>
                                        <select required v-model="application.borrower.employment.contract_type" class="form-control" name="contract_type" id="contract_type">
                                            <option disabled value="">Please select one option</option>
                                            <option v-for="option in contract_types" v-bind:value="option.id">
                                                {{ option.label }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="professional_sector">Sector:</label>
                                        <select required v-model="application.borrower.employment.professional_sector" class="form-control" name="professional_sector" id="professional_sector">
                                            <option disabled value="">Please select one option</option>
                                            <option v-for="option in professional_sectors" v-bind:value="option.id">
                                                {{ option.label }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="professional_industry">Industry:</label>
                                        <select required v-model="application.borrower.employment.professional_industry" class="form-control" name="professional_industry" id="professional_industry">
                                            <option disabled value="">Please select one option</option>
                                            <option v-for="option in professional_industries" v-bind:value="option.id">
                                                {{ option.label }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="professional_activity">Activity:</label>
                                        <select required v-model="application.borrower.employment.professional_activity" class="form-control" name="professional_activity" id="professional_activity">
                                            <option disabled value="">Please select one option</option>
                                            <option v-for="option in professional_activities" v-bind:value="option.id">
                                                {{ option.label }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="incomes">Incomes:</label>
                                    </div>
                                </div>
                                <div class="row" id="incomes" name="incomes" v-for="(income, index) in application.borrower.incomes">
                                    <div class="form-group col-md-4">
                                        <select required v-model="income.type" class="form-control col-md-2" name="income_type" id="income_type">
                                            <option disabled value="">Please select one option</option>
                                            <option v-for="option in income_types" v-bind:value="option.id">
                                                {{ option.label }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" class="form-control col-md-2" v-model="income.net_monthly" placeholder="Net monthly">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="number" class="form-control" v-model="income.annual_payments" placeholder="Annual payments">
                                    </div>
                                    <div form-group col-md-3>
                                        <button @click="removeIncome" type="button" class="btn btn-default btn-md"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                        <button @click="addIncome" type="button" class="btn btn-default btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="expenses">Expenses:</label>
                                    </div>
                                </div>
                                <div class="row" id="expenses" name="expenses" v-for="(expense, index) in application.borrower.expenses">
                                    <div class="form-group col-md-4">
                                        <select required v-model="expense.type" class="form-control col-md-2" name="expense_type" id="expense_type">
                                            <option disabled value="">Please select one option</option>
                                            <option v-for="option in expense_types" v-bind:value="option.id">
                                                {{ option.label }}
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="number" class="form-control col-md-2" v-model="expense.net_monthly" placeholder="Net monthly">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="number" class="form-control" v-model="expense.outstanding_amount" placeholder="Outstanding amount">
                                    </div>
                                    <div form-group col-md-3>
                                        <button @click="removeExpense" type="button" class="btn btn-default btn-md"><span class="glyphicon glyphicon-minus" aria-hidden="true"></span></button>
                                        <button @click="addExpense" type="button" class="btn btn-default btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </tab-content>
            <tab-content title="Last step"
                         icon="ti-check">
                Yuhuuu! This seems pretty damn simple
            </tab-content>
            <input type="hidden" id="id" name="id" v-model="application.id" v-bind:value="application.id">
        </form-wizard>
        <div class="modal fade" tabindex="-1" role="dialog" id="email_confirmed">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Thanks to confirm your email!</h4>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</template>

<script>
    export default {
        data() {
            return {
                application: {
                    id:'',
                    amount:'',
                    purpose:'',
                    period:'',
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
                        incomes: [{
                            type: '',
                            net_monthly: '',
                            annual_payments: ''
                        }],
                        expenses: [{
                            type: '',
                            net_monthly: '',
                            outstanding_amount: ''
                        }],
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
                            country: ''
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
                street_types: [],
                residence_types: [],
                contract_types: [],
                professional_sectors: [],
                professional_industries: [],
                professional_activities: [],
                income_types: [],
                expense_types: [],
                errors: [],
            }
        },
        mounted() {
            this.populateForm();
        },
        methods: {
            addIncome: function() {
                var elem = document.createElement('div');
                this.application.borrower.incomes.push({
                    annual_payments: "",
                    net_monthly: "",
                    type: "",
                });
            },
            removeIncome: function(index) {
                if (this.application.borrower.incomes.length > 1) {
                    this.application.borrower.incomes.splice(index, 1);
                }
            },
            addExpense: function() {
                var elem = document.createElement('div');
                this.application.borrower.expenses.push({
                    outstanding_amount: "",
                    net_monthly: "",
                    type: "",
                });
            },
            removeExpense: function(index) {
                if (this.application.borrower.expenses.length > 1) {
                    this.application.borrower.expenses.splice(index, 1);
                }
            },
            getApplication() {
                return {
                    id: this.application.id,
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
                        incomes: this.application.borrower.incomes,
                        expenses: this.application.borrower.expenses,
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
                            country: this.application.borrower.address.country
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
                    },
                }
            },
            createApplication() {
                var application = this.getApplication();

                if (application.id) {
                    this.updateApplication(application);
                } else {
                    this.newApplication(application);
                }
            },
            newApplication(application) {
                axios.post('/api/v1/application', application)
                    .then(response => {
                        alert('Yay. Created!');
                        this.application.id = response.data.id;
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
            updateApplication(application) {
                axios.patch('/api/v1/application/' + application.id, application)
                    .then(response => {
                        alert('Yay. Updated!');
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
                axios.get('api/v1/street-type')
                    .then(response => {
                        this.street_types = response.data;
                    });
                axios.get('api/v1/residence-type')
                    .then(response => {
                        this.residence_types = response.data;
                    });
                axios.get('api/v1/contract-type')
                    .then(response => {
                        this.contract_types = response.data;
                    });
                axios.get('api/v1/professional-sector')
                    .then(response => {
                        this.professional_sectors = response.data;
                    });
                axios.get('api/v1/professional-industry')
                    .then(response => {
                        this.professional_industries = response.data;
                    });
                axios.get('api/v1/professional-activity')
                    .then(response => {
                        this.professional_activities = response.data;
                    });
                axios.get('api/v1/income-type')
                    .then(response => {
                        this.income_types = response.data;
                    });
                axios.get('api/v1/expense-type')
                    .then(response => {
                        this.expense_types = response.data;
                    });
            },
        }
    }

    Echo.channel('email-confirmed')
        .listen('EmailConfirmed', (e) => {
            if (e.applicationId === $('#id').val()) {//todo a ver como lo cojo del objeto
                $("#email_confirmed").modal("show");
            }
        });
</script>