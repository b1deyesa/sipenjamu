<x-crud-table 
    :items="$monevs" 
    :searchField="[
        'Form Name' => 'name',
        'Slug' => 'slug'
    ]"
    createComponent="dashboard.admin.monev.buku.create" 
    {{-- updateComponentPrefix="dashboard.admin.spmi.pelaksanaan.update" 
    deleteComponentPrefix="dashboard.admin.spmi.pelaksanaan.delete"
    reviewComponentPrefix="dashboard.admin.spmi.pelaksanaan.review" --}}
>
</x-crud-table>