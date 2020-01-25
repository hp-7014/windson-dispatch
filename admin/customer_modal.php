<!--  Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" id="add_customer"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content custom-modal-content">
            <div class="modal-header custom-modal-header">
                <h5 class="modal-title custom-modal-title mt-0" id="myLargeModalLabel">Add
                    Customer</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body custom-modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item show" id="home-title">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#"
                           role="tab" aria-controls="home"
                           aria-selected="true">Add Customer
                        </a>
                    </li>
                    <li class="nav-item" id="profile-title">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#"
                           role="tab" aria-controls="profile"
                           aria-selected="false">Add Advance</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                         aria-labelledby="home-tab">
                        <br>
                        <form>
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label>Customer Name *</label>
                                    <div>
                                        <input class="form-control" placeholder="Company Name"
                                               type="text" id="custName">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Address *</label>
                                    <div>
                                        <input class="form-control" placeholder="Address *"
                                               type="text" id="custAddress">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Location *</label>
                                    <div>
                                        <input class="form-control"
                                               placeholder="Enter a location" type="text"
                                               id="custLocation">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Zip *</label>
                                    <div>
                                        <input class="form-control" placeholder="Zip Code"
                                               type="text" id="custZip">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Billing Address</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                               id="customCheck1" data-parsley-multiple="groups"
                                               data-parsley-mincheck="2">
                                        <label class="custom-control-label" for="customCheck1">Same
                                            as Mailing Address</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Billing Address</label>
                                    <div>
                                        <input class="form-control"
                                               placeholder="Billing Address" type="text"
                                               id="billingAddress">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Location </label>
                                    <div>
                                        <input class="form-control"
                                               placeholder="Enter a location" type="text"
                                               id="billingLocation">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Zip </label>
                                    <div>
                                        <input class="form-control" placeholder="Zip Code"
                                               type="text" id="billingZip">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Primary Contact</label>
                                    <div>
                                        <input class="form-control"
                                               placeholder="Primary Contact" type="text"
                                               id="primaryContact">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Telephone</label>
                                    <div>
                                        <input class="form-control" type="text"
                                               id="custTelephone">
                                    </div>
                                </div>
                                <div class="form-group col-md-1">
                                    <label>Ext</label>
                                    <div>
                                        <input class="form-control" placeholder="Ext"
                                               type="text" id="ext1">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Email</label>
                                    <div>
                                        <input class="form-control" type="email"
                                               value="bootstrap@example.com"
                                               id="custEmail">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Fax</label>
                                    <div>
                                        <input class="form-control" placeholder="Fax"
                                               type="text" id="custFax">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Billing Contact</label>
                                    <div>
                                        <input class="form-control"
                                               placeholder="Billing Contact" type="text"
                                               id="billingContact">
                                    </div>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Billing Email</label>
                                    <div>
                                        <input class="form-control" type="email"
                                               value="" id="billingEmail">
                                    </div>
                                </div>
                                <div class="form-group col-md-2 ">
                                    <label>Billing Telephone</label>
                                    <div>
                                        <input class="form-control" type="text"
                                               id="billingTelephone">
                                    </div>
                                </div>
                                <div class="form-group col-md-1">
                                    <label>Ext</label>
                                    <div>
                                        <input class="form-control" placeholder="Ext"
                                               type="text" id="ext2">
                                    </div>
                                </div>
                                <div class="form-group col-md-1">
                                    <label>URS</label>
                                    <div>
                                        <input class="form-control" placeholder="URS"
                                               type="text" id="URS">
                                    </div>
                                </div>
                                <div class="form-group col-md-1" id="mcShow" style="display: none">
                                    <label>M.C.</label>
                                    <div>
                                        <input class="form-control" placeholder="M.C."
                                               type="text" id="MC">
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Blacklisted</label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                               id="customCheck2" name="blacklisted" data-parsley-multiple="groups"
                                               data-parsley-mincheck="2">
                                        <label class="custom-control-label" for="customCheck2">This
                                            Customer is Blacklisted</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Is Broker </label>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input"
                                               id="customCheck3" onclick="showFields()" name="isBroker" value="1"
                                               data-parsley-multiple="groups"
                                               data-parsley-mincheck="2">
                                        <label class="custom-control-label" for="customCheck3">This
                                            is a Broker</label>
                                    </div>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Duplicate</label>
                                    <div class="row">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="customCheck7"
                                                   name="AsShipper"
                                                   data-parsley-multiple="groups"
                                                   data-parsley-mincheck="2">
                                            <label class="custom-control-label"
                                                   for="customCheck7">As a Shipper</label>
                                        </div>&nbsp;&nbsp;
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input"
                                                   id="customCheck8" name="AsConsignee"
                                                   data-parsley-multiple="groups"
                                                   data-parsley-mincheck="2">
                                            <label class="custom-control-label"
                                                   for="customCheck8">As a Consignee</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr>
                            <button onclick="toggle()" class="btn btn-success float-right">Next
                            </button>
                        </form>
                    </div>
                    <script type="text/javascript">
                        function toggle() {
                            $("#home").toggleClass("show");
                            $("#home").toggleClass("active");
                            $("#profile").toggleClass("show");
                            $("#profile").toggleClass("active");
                            $("#home-tab").toggleClass("active");
                            $("#profile-tab").toggleClass("active");
                            if ($("#home-tab").attr("aria-selected") === 'true') {
                                $("#home-tab").attr("aria-selected", "false");
                            } else {
                                $("#home-tab").attr("aria-selected", "true");
                            }
                            if ($("#profile-tab").attr("aria-selected") === 'true') {
                                $("#profile-tab").attr("aria-selected", "false");
                            } else {
                                $("#profile-tab").attr("aria-selected", "true");
                            }

                            $("#home-title").toggleClass("show");
                            $("#profile-title").toggleClass("show");

                        }
                    </script>
                    <div class="tab-pane fade" id="profile" role="tabpanel"
                         aria-labelledby="profile-tab">
                        <br>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Currency Setting *</label>
                                <select class="form-control">
                                    <option>USD</option>
                                    <option>USD</option>
                                    <option>CAD</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Payment Terms*</label>
                                <select class="form-control">
                                    <option>30 Days</option>
                                    <option>abc</option>
                                    <option>xyz</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Credit Limit $</label>
                                <div>
                                    <input class="form-control" placeholder="Credit Limit $"
                                           type="text" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Sales Rep</label>
                                <select class="form-control">
                                    <option>Select</option>
                                    <option>abc</option>
                                    <option>xyz</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Factoring Company</label>
                                <select class="form-control">
                                    <option>Select</option>
                                    <option>abc</option>
                                    <option>xyz</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Federal ID</label>
                                <div>
                                    <input class="form-control" placeholder="Federal ID"
                                           type="text" id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Worker's Comp #</label>
                                <div>
                                    <input class="form-control"
                                           placeholder="Worker's Comp # " type="text"
                                           id="example-text-input">
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Website URL</label>
                                <div>
                                    <input class="form-control" placeholder="Website URL"
                                           type="text" id="example-text-input">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Numbers on Invoice
                                </label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                           id="customCheck5" data-parsley-multiple="groups"
                                           data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="customCheck5">Show
                                        tel. and fax number on Invoice</label>
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <label>Customer Rate</label>
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                           id="customCheck6" data-parsley-multiple="groups"
                                           data-parsley-mincheck="2">
                                    <label class="custom-control-label" for="customCheck6">Show
                                        detailed Rate on Invoice</label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Internal Notes</label>
                                <div>
                                        <textarea rows="3" cols="30" class="form-control"
                                                  type="textarea"
                                                  id="example-text-input"></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <button onclick="addCustomer()" class="float-right btn btn-primary">Save</button>
                        <button style="margin-right: 3px" data-dismiss="modal" class="float-right btn btn-danger">
                            Close
                        </button>
                        <button onclick="toggle()" style="margin-right: 3px" class="float-right btn btn-secondary">
                            Previous
                        </button>

                        </form>
                    </div>
                </div>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->