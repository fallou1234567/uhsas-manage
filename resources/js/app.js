//
document.addEventListener('DOMContentLoaded', () => {

    const regionSelect = document.getElementById('region_id');
    const departmentSelect = document.getElementById('department_id');
    const communeSelect = document.getElementById('commune_id');

    if (!regionSelect) {
        return;
    }

    regionSelect.addEventListener('change', async () => {

        const regionId = regionSelect.value;

        departmentSelect.innerHTML =
            '<option value="">Chargement...</option>';

        communeSelect.innerHTML =
            '<option value="">Sélectionner d’abord le département</option>';

        departmentSelect.disabled = true;
        communeSelect.disabled = true;

        if (!regionId) {
            return;
        }

        try {

            const response = await fetch(
                `/api/regions/${regionId}/departments`
            );

            const departments = await response.json();

            departmentSelect.innerHTML =
                '<option value="">Sélectionner un département</option>';

            departments.forEach(department => {

                const option = document.createElement('option');

                option.value = department.id;
                option.textContent = department.name;

                departmentSelect.appendChild(option);

            });

            departmentSelect.disabled = false;

        } catch (error) {

            departmentSelect.innerHTML =
                '<option value="">Erreur de chargement</option>';

        }
    });

    departmentSelect.addEventListener('change', async () => {

        const departmentId = departmentSelect.value;

        communeSelect.innerHTML =
            '<option value="">Chargement...</option>';

        communeSelect.disabled = true;

        if (!departmentId) {
            return;
        }

        try {

            const response = await fetch(
                `/api/departments/${departmentId}/communes`
            );

            const communes = await response.json();

            communeSelect.innerHTML =
                '<option value="">Sélectionner une commune</option>';

            communes.forEach(commune => {

                const option = document.createElement('option');

                option.value = commune.id;
                option.textContent = commune.name;

                communeSelect.appendChild(option);

            });

            communeSelect.disabled = false;

        } catch (error) {

            communeSelect.innerHTML =
                '<option value="">Erreur de chargement</option>';

        }
    });

});