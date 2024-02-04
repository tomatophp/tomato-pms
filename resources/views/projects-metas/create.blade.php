<x-tomato-admin-container label="{{trans('tomato-admin::global.crud.create')}} {{__('ProjectsMeta')}}">
    <x-splade-form class="flex flex-col space-y-4" action="{{route('admin.projects-metas.store')}}" method="post">
        
          <x-splade-select :label="__('Project id')" :placeholder="__('Project id')" name="project_id" remote-url="/admin/projects/api" remote-root="data" option-label="name" option-value="id" choices/>
          <x-splade-input :label="__('Key')" name="key" type="text"  :placeholder="__('Key')" />
          
          <x-splade-input :label="__('Type')" name="type" type="text"  :placeholder="__('Type')" />
          <x-splade-input :label="__('Group')" name="group" type="text"  :placeholder="__('Group')" />

        <div class="flex justify-start gap-2 pt-3">
            <x-tomato-admin-submit  label="{{__('Save')}}" :spinner="true" />
            <x-tomato-admin-button secondary :href="route('admin.projects-metas.index')" label="{{__('Cancel')}}"/>
        </div>
    </x-splade-form>
</x-tomato-admin-container>
