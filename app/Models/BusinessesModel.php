<?php

namespace App\Models;

use CodeIgniter\Model;

class BusinessesModel extends Model
{
    protected $table      = 'businesses';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id_number',
        'id_expire_date',
        'id_first_name',
        'id_second_name',
        'id_third_name',
        'id_sur_name',
        'id_date_of_birth',
        'id_document',
        'id_address',
        // Fields for Step 2
        'cr_name_en',
        'cr_name_ar',
        'cr_number',
        'cr_email',
        'cr_gsm',
        'cr_po_box',
        'cr_postal_code',
        'cr_fax',
        'cr_establishment_date',
        'cr_expiry_date',
        'cr_legal_type',
        'cr_head_quarter',
        'cr_document',
        // Fields for Step 3
        'cc_cr_number',
        'cc_head_quarter',
        'cc_occi_number',
        'cc_document',
        'cc_expire_date',
        // Fields for Step 4
        'ta_governorate',
        'ta_complex_no',
        'ta_state',
        'ta_plot_no',
        'ta_area',
        'ta_building_no',
        'ta_street_name_no',
        'ta_flat_shop_no',
        'ta_way_no',
        'ta_type_of_activity',
        'ta_rent_contract_no',
        'ta_expire_date',
        'ta_document',
        // Fields for Step 5
        'lc_cr_number',
        'lc_governorate',
        'lc_rent_contract_no',
        'lc_state',
        'lc_area',
        'lc_poa_code',
        'lc_license_type',
        'lc_license_name',
        'lc_license_number',
        'lc_expire_date',
        'lc_activities_code',
        'lc_activities_description',
        'lc_document',
        // Fields for Step 6
        'tcc_cr_number',
        'tcc_tax_card_number',
        'tcc_tin',
        'tcc_expire_date',
        'tcc_document',
        // Fields for Step 7
        'vc_cr_number',
        'vc_vat_certificate_number',
        'vc_vatin',
        'vc_expire_date',
        'vc_document',
        'pid',
    ];

    public function insertUser($data)
    {
        return $this->insert($data);
    }
}