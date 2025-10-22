<x-crud-table 
    :items="$monevs" 
    :search-field="[
        [
            'label' => 'Form Name', 
            'name' => 'name'
        ],
        [
            'label' => 'Slug/Code', 
            'name' => 'slug',
            'type' => 'slug',
            'width' => '200px',
            'align' => 'center'
        ],
    ]"
    createComponent="dashboard.admin.monev.buku.create" 
    {{-- update-component-prefix="dashboard.admin.spmi.peningkatan.update" 
    delete-component-prefix="dashboard.admin.spmi.peningkatan.delete"
    review-component-prefix="dashboard.admin.spmi.peningkatan.review" --}}
/>