 
<?php
echo "Hello" ;
 ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" /> -->
</head>
<body class="bg-white flex">
<div class="w-2/12 bg-yellow-600  h-screen p-5 shadow-lg max-h-screen overflow-y-auto">
    <h2 class="text-xl font-bold mb-4 ">Menu </h2>
    <ul>
        <li class="h-16 flex items-center mb-2">
            <i class="fas fa-tachometer-alt text-white mr-2"></i>
            <a href="#" class="text-white hover:underline" onclick="showSection('dashboard')">Dashboard</a>
        </li>
        <li class="h-16 flex items-center mb-2">
            <i class="fas fa-tags text-white mr-2"></i>
            <a href="#" class="text-white hover:underline" onclick="showSection('offres')">Offres</a>
        </li>
        <li class="h-16 flex items-center mb-2">
            <i class="fas fa-project-diagram text-white mr-2"></i>
            <a href="#" class="text-white hover:underline" onclick="showSection('projets')">Projets</a>
        </li>
        <li class="h-16 flex items-center mb-2">
            <i class="fas fa-users text-white mr-2"></i>
            <a href="#" class="text-white hover:underline" onclick="showSection('utilisateurs')">Utilisateurs</a>
        </li>
        <li class="h-16 flex items-center mb-2">
            <i class="fas fa-user-tie text-white mr-2"></i>
            <a href="#" class="text-white hover:underline" onclick="showSection('freelancers')">Freelancers</a>
        </li>
        <li class="h-16 flex items-center mb-2">
            <i class="fa-solid fa-table-list mr-2 text-white"></i>
            <a href="#" class="text-white hover:underline" onclick="showSection('categorier')">Catégories</a>
        </li>
        <li class="h-16 flex items-center mb-2 text-white">
            <i class="fa-solid fa-list mr-2"></i>
            <a href="#" class="text-white hover:underline" onclick="showSection('sous_categories')">Sous Catégories</a>
        </li>
    </ul>
</div>
<div class="flex-1 p-6">
    <div class="flex justify-end mb-4">
        <form method="POST" action="logout.php">
            <button type="submit" class="bg-red-300 text-white p-2 rounded-lg shadow-md transition-transform transform hover:scale-105 hover:bg-red-700 mt-8 mr-5">
                <i class="fas fa-sign-out-alt mr-2"></i> Se déconnecter
            </button>
        </form>
    </div>
    <h1 class="text-2xl font-bold mb-6">Hello Admin</h1>

    <div id="content">
        <div id="dashboard">
            <h2></h2>
            <div class="grid grid-cols-3 gap-4 mt-4">
                <div class="bg-yellow-600 px-4 py-6 rounded-lg shadow-lg flex justify-around items-center transition-transform transform hover:scale-105">
                    <i class="fas fa-users text-white text-4xl"></i>
                    <div>
                        <h3 class="text-lg font-bold text-white">Total Utilisateurs</h3>
                        <p class="text-3xl font-semibold text-white"><?php echo $totalUtilisateurs; ?></p>
                    </div>
                </div>
                <div class="bg-yellow-600 px-4 py-6 rounded-lg shadow-lg flex justify-around items-center transition-transform transform hover:scale-105">
                    <i class="fas fa-user-tie text-white text-4xl"></i>
                    <div>
                        <h3 class="text-lg font-bold text-white">Total Freelancers</h3>
                        <p class="text-3xl font-semibold text-white"><?php echo $totalFreelancers; ?></p>
                    </div>
                </div>
                <div class="bg-yellow-600 px-4 py-6 rounded-lg shadow-lg flex justify-around items-center transition-transform transform hover:scale-105">
                    <i class="fas fa-th-list text-white text-4xl"></i>
                    <div>
                        <h3 class="text-lg font-bold text-white">Total Catégories</h3>
                        <p class="text-3xl font-semibold text-white"><?php echo $totalCategories; ?></p>
                    </div>
                </div>
                <div class="bg-yellow-600 px-4 py-6 rounded-lg shadow-lg flex justify-around items-center transition-transform transform hover:scale-105">
                    <i class="fas fa-list-alt text-white text-4xl"></i>
                    <div>
                        <h3 class="text-lg font-bold text-white">Total Sous-Catégories</h3>
                        <p class="text-3xl font-semibold text-white"><?php echo $totalSousCategories; ?></p>
                    </div>
                </div>
                <div class="bg-yellow-600 px-4 py-6 rounded-lg shadow-lg flex justify-around items-center transition-transform transform hover:scale-105">
                    <i class="fas fa-project-diagram text-white text-4xl"></i>
                    <div>
                        <h3 class="text-lg font-bold text-white">Total Projets</h3>
                        <p class="text-3xl font-semibold text-white"><?php echo $totalProjet; ?></p>
                    </div>
                </div>
                <div class="bg-yellow-600 px-4 py-6 rounded-lg shadow-lg flex justify-around items-center transition-transform transform hover:scale-105">
                    <i class="fas fa-tags text-white text-4xl"></i>
                    <div>
                        <h3 class="text-lg font-bold text-white">Total Offres</h3>
                        <p class="text-3xl font-semibold text-white"><?php echo $totalOffres; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <div id="offres" class="hidden">
            <h2 class="text-xl font-bold mb-4">Liste des Offres</h2>
            <table class="min-w-full border-collapse border border-gray-200 bg-white">
                <thead>
                    <tr>
                        <th class="border border-gray-200 p-2">ID Offre</th>
                        <th class="border border-gray-200 p-2">Montant</th>
                        <th class="border border-gray-200 p-2">Freelance ID</th>
                        <th class="border border-gray-200 p-2">Projet ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($offres as $offre): ?>
                    <tr>
                        <td class="border border-gray-200 p-2"><?php echo $offre['id_offre']; ?></td>
                        <td class="border border-gray-200 p-2"><?php echo $offre['montant']; ?></td>
                        <td class="border border-gray-200 p-2"><?php echo $offre['id_utilisateur']; ?></td>
                        <td class="border border-gray-200 p-2"><?php echo $offre['id_projet']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div id="projets" class="hidden">
            <h2 class="text-xl font-bold mb-4">Liste des Projets</h2>
            <table class="min-w-full border-collapse border border-gray-200 bg-white">
                <thead>
                    <tr>
                        <th class="border border-gray-200 p-2">ID Projet</th>
                        <th class="border border-gray-200 p-2">Titre</th>
                        <th class="border border-gray-200 p-2">Description</th>
                        <th class="border border-gray-200 p-2">Catégorie ID</th>
                        <th class="border border-gray-200 p-2">Utilisateur ID</th>
                        <th class="border border-gray-200 p-2">État</th>
                        <th class="border border-gray-200 p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($projets as $projet): ?>
                    <tr>
                        <td class="border border-gray-200 p-2"><?php echo $projet['id_projet']; ?></td>
                        <td class="border border-gray-200 p-2"><?php echo $projet['titre_projet']; ?></td>
                        <td class="border border-gray-200 p-2"><?php echo $projet['description']; ?></td>
                        <td class="border border-gray-200 p-2"><?php echo $projet['nom_categorie']; ?></td>
                        <td class="border border-gray-200 p-2"><?php echo $projet['nom_utilisateur']; ?></td>
                        <td class="border border-gray-200 p-2"><?php echo $projet['etat']; ?></td>
                        <td class="border border-gray-200 p-2">
                            
                        <button onclick="showUpdateForm(<?php echo $projet['id_projet']; ?>, '<?php echo addslashes($projet['titre_projet']); ?>', '<?php echo addslashes($projet['description']); ?>', '<?php echo addslashes($projet['etat']); ?>')" class="bg-yellow-500 text-white p-1 rounded">Update</button>

                        <form method="POST" action="confirm_delete.php">
                            <input type="hidden" name="id_projet" value="<?php echo $projet['id_projet']; ?>">
                            <input type="hidden" name="type" value="projet">
                            <button type="submit" class="bg-red-600 text-white p-1 rounded">Delete</button>
                        </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            

            
            
            <div id="updateForm" class="hidden mt-4 p-6 bg-white shadow-md rounded-lg">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Mettre à jour le projet</h3>
                <form method="POST" action="">
                    <input type="hidden" name="id_projet" id="update_id_projet">
                    <div class="mb-4">
                        <label for="update_titre_projet" class="block text-sm font-medium text-gray-700">Titre</label>
                        <input type="text" name="titre_projet" id="update_titre_projet" placeholder="Titre" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="update_description" class="block text-sm font-medium text-gray-700">Description</label>
                        <input type="text" name="description" id="update_description" placeholder="Description" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="update_etat" class="block text-sm font-medium text-gray-700">État</label>
                        <select name="etat" id="update_etat" class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                            <option value="à faire">À faire</option>
                            <option value="en cours">En cours</option>
                            <option value="terminé">Terminé</option>
                        </select>
                    </div>
                    <div class="flex justify-between">
                        <button type="submit" name="update_projet" class="bg-blue-500 text-white p-2 rounded hover:bg-yellow-600 transition duration-200">Sauvegarder</button>
                        <button type="button" onclick="hideUpdateForm()" class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600 transition duration-200">Annuler</button>
                    </div>
                    </form>
                </div>
            
            </div>

            <div id="utilisateurs" class="hidden">
                <h2 class="text-xl font-bold mb-4">Liste des Utilisateurs</h2>
                <table class="min-w-full border-collapse border border-gray-200 bg-white">
                    <thead>
                        <tr>
                            <th class="border border-gray-200 p-2">ID Utilisateur</th>
                            <th class="border border-gray-200 p-2">Nom</th>
                            <th class="border border-gray-200 p-2">Email</th>
                            <th class="border border-gray-200 p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($utilisateurs as $utilisateur): ?>
                        <tr>
                            <td class="border border-gray-200 p-2"><?php echo $utilisateur['id_utilisateur']; ?></td>
                            <td class="border border-gray-200 p-2"><?php echo $utilisateur['nom_utilisateur']; ?></td>
                            <td class="border border-gray-200 p-2"><?php echo $utilisateur['email']; ?></td>
                            <td class="border border-gray-200 p-2">
                                

                                <form method="POST" action="confirm_delete.php">
                                    <input type="hidden" name="id_utilisateur" value="<?php echo $utilisateur['id_utilisateur']; ?>">
                                    <input type="hidden" name="type" value="utilisateur">
                                    <button type="submit" class="bg-red-600 text-white p-1 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div id="freelancers" class="hidden">
                <h2 class="text-xl font-bold mb-4">Liste des Freelancers</h2>
                <table class="min-w-full border-collapse border border-gray-200 bg-white">
                    <thead>
                        <tr>
                            <th class="border border-gray-200 p-2">ID Freelancer</th>
                            <th class="border border-gray-200 p-2">Nom</th>
                            <th class="border border-gray-200 p-2">Competences</th>
                            <th class="border border-gray-200 p-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($freelances as $freelance): ?>
                        <tr>
                            <td class="border border-gray-200 p-2"><?php echo $freelance['id_freelance']; ?></td>
                            <td class="border border-gray-200 p-2"><?php echo $freelance['nom_freelance']; ?></td>
                            <td class="border border-gray-200 p-2"><?php echo $freelance['competences']; ?></td>
                            <td class="border border-gray-200 p-2">
                            

                            <form method="POST" action="confirm_delete.php">
                                <input type="hidden" name="id_freelance" value="<?php echo $freelance['id_freelance']; ?>">
                                <input type="hidden" name="type" value="freelance">
                                <button type="submit" class="bg-red-600 text-white p-1 rounded">Delete</button>
                            </form>   
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

            <div id="categorier" class="hidden">
                <h2 class="text-xl font-bold mb-4">Liste des Catégories</h2>
            <table class="min-w-full border-collapse border border-gray-200 bg-white">
                <thead>
                    <tr>
                        <th class="border border-gray-200 p-2">ID Catégorie</th>
                        <th class="border border-gray-200 p-2">Nom</th>
                        <th class="border border-gray-200 p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categorier as $categorie): ?>
                    <tr>
                        <td class="border border-gray-200 p-2"><?php echo $categorie['id_categorie']; ?></td>
                        <td class="border border-gray-200 p-2"><?php echo $categorie['nom_categorie']; ?></td>
                        <td class="border border-gray-200 p-2">
                            <button onclick="showUpdateCategoryForm(<?php echo $categorie['id_categorie']; ?>, '<?php echo addslashes($categorie['nom_categorie']); ?>')" class="bg-yellow-500 text-white p-1 rounded">Update</button>

                            <form method="POST" action="confirm_delete.php">
                                <input type="hidden" name="id_categorie" value="<?php echo $categorie['id_categorie']; ?>">
                                <input type="hidden" name="type" value="categorie">
                                <button type="submit" class="bg-red-600 text-white p-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <button onclick="showAddCategoryForm()" class="bg-green-500 text-white p-2 rounded m-4">Ajouter une Catégorie</button>

            <div id="addCategoryForm" class="hidden mt-4">
                <h3 class="text-lg font-bold">Ajouter une Catégorie</h3>
                <form method="POST" action="">
                    <input type="text" name="nom_categorie" placeholder="Nom de la catégorie" required class="border p-2 mb-2 w-full">
                    <button type="submit" name="add_categorie" class="bg-blue-500 text-white p-1 rounded">Ajouter</button>
                    <button type="button" onclick="hideAddCategoryForm()" class="bg-gray-500 text-white p-1 rounded">Annuler</button>
                </form>
            </div>

            <div id="updateCategoryForm" class="hidden mt-4 p-6 bg-white shadow-md rounded-lg">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Mettre à jour la Catégorie</h3>
                <form method="POST" action="">
                    <input type="hidden" name="id_categorie" id="update_id_categorie">
                    <div class="mb-4">
                        <label for="update_nom_categorie" class="block text-sm font-medium text-gray-700">Nom de la Catégorie</label>
                        <input type="text" name="nom_categorie" id="update_nom_categorie" placeholder="Nom de la catégorie" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                    </div>
                    <div class="flex justify-between">
                        <button type="submit" name="update_categorie" class="bg-blue-500 text-white p-2 rounded hover:bg-yellow-600 transition duration-200">Sauvegarder</button>
                        <button type="button" onclick="hideUpdateCategoryForm()" class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600 transition duration-200">Annuler</button>
                    </div>
                </form>
            </div>
        </div>

        <div id="sous_categories" class="hidden">
            <h2 class="text-xl font-bold mb-4">Liste des Sous-Catégories</h2>
            <table class="min-w-full border-collapse border border-gray-200 bg-white">
                <thead>
                    <tr>
                        <th class="border border-gray-200 p-2">ID Sous-Catégorie</th>
                        <th class="border border-gray-200 p-2">Nom</th>
                        <th class="border border-gray-200 p-2">Catégorie</th> 
                        <th class="border border-gray-200 p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sous_categorier as $sous_categorie): ?>
                    <tr>
                        <td class="border border-gray-200 p-2"><?php echo $sous_categorie['id_sous_categorie']; ?></td>
                        <td class="border border-gray-200 p-2"><?php echo $sous_categorie['nom_sous_categorie']; ?></td>
                        <td class="border border-gray-200 p-2"><?php echo $sous_categorie['nom_categorie']; ?></td> <!-- Affichage du nom de la catégorie -->
                        <td class="border border-gray-200 p-2">
                            <button onclick="showUpdateSousCategoryForm(<?php echo $sous_categorie['id_sous_categorie']; ?>, '<?php echo addslashes($sous_categorie['nom_sous_categorie']); ?>', <?php echo $sous_categorie['id_categorie']; ?>)" class="bg-yellow-500 text-white p-1 rounded">Update</button>

                            <form method="POST" action="confirm_delete.php">
                                <input type="hidden" name="id_sous_categorie" value="<?php echo $sous_categorie['id_sous_categorie']; ?>">
                                <input type="hidden" name="type" value="sous_categorie">
                                <button type="submit" class="bg-red-600 text-white p-1 rounded">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <button onclick="showAddSousCategoryForm()" class="bg-green-500 text-white p-2 rounded m-4">Ajouter une Sous-Catégorie</button>

            <div id="addSousCategoryForm" class="hidden mt-4">
                <h3 class="text-lg font-bold">Ajouter une Sous-Catégorie</h3>
                <form method="POST" action="">
                    <input type="text" name="nom_sous_categorie" placeholder="Nom de la sous-catégorie" required class="border p-2 mb-2 w-full">
                    <select name="id_categorie" required class="border p-2 mb-2 w-full">
                        <option value="">Sélectionner une catégorie</option>
                        <?php foreach ($categorier as $categorie): ?>
                            <option value="<?php echo $categorie['id_categorie']; ?>"><?php echo $categorie['nom_categorie']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" name="add_sous_categorie" class="bg-blue-500 text-white p-1 rounded">Ajouter</button>
                    <button type="button" onclick="hideAddSousCategoryForm()" class="bg-gray-500 text-white p-1 rounded">Annuler</button>
                </form>
            </div>

            <div id="updateSousCategoryForm" class="hidden mt-4 p-6 bg-white shadow-md rounded-lg">
                <h3 class="text-lg font-bold text-gray-800 mb-4">Mettre à jour la Sous-Catégorie</h3>
                <form method="POST" action="">
                    <input type="hidden" name="id_sous_c ategorie" id="update_id_sous_categorie">
                    <div class="mb-4">
                        <label for="update_nom_sous_categorie" class="block text-sm font-medium text-gray-700">Nom de la Sous-Catégorie</label>
                        <input type="text" name="nom_sous_categorie" id="update_nom_sous_categorie" placeholder="Nom de la sous-catégorie" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                    </div>
                    <div class="mb-4">
                        <label for="update_id_categorie" class="block text-sm font-medium text-gray-700">Catégorie</label>
                        <select name="id_categorie" id="update_id_categorie" required class="mt-1 block w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-blue-500">
                            <option value="">Sélectionner une catégorie</option>
                            <?php foreach ($categorier as $categorie): ?>
                                <option value="<?php echo $categorie['id_categorie']; ?>"><?php echo $categorie['nom_categorie']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="flex justify-between">
                        <button type="submit" name="update_sous_categorie" class="bg-blue-500 text-white p-2 rounded hover:bg-yellow-600 transition duration-200">Sauvegarder</button>
                        <button type="button" onclick="hideUpdateSousCategoryForm()" class="bg-gray-500 text-white p-2 rounded hover:bg-gray-600 transition duration-200">Annuler</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function showSection(sectionId) {
        const sections = ['dashboard', 'offres', 'projets', 'utilisateurs', 'freelancers', 'categorier', 'sous_categories'];
        sections.forEach(section => {
        document.getElementById(section).classList.add('hidden');
        });
        document.getElementById(sectionId).classList.remove('hidden');
    }

    function showUpdateForm(id, titre, description, etat) {
        document.getElementById('update_id_projet').value = id;
        document.getElementById('update_titre_projet').value = titre;
        document.getElementById('update_description').value = description;
        document.getElementById('update_etat').value = etat; 
        document.getElementById('updateForm').classList.remove('hidden');
    }

    function hideUpdateForm() {
        document.getElementById('updateForm').classList.add('hidden');
    }

    

    function showUpdateCategoryForm(id, nom) {
        document.getElementById('update_id_categorie').value = id;
        document.getElementById('update_nom_categorie').value = nom;
        document.getElementById('updateCategoryForm').classList.remove('hidden');
    }

    function hideUpdateCategoryForm() {
        document.getElementById('updateCategoryForm').classList.add('hidden');
    }

    function showAddCategoryForm() {
        document.getElementById('addCategoryForm').classList.remove('hidden');
    }

    function hideAddCategoryForm() {
        document.getElementById('addCategoryForm').classList.add('hidden');
    }

    function showUpdateSousCategoryForm(id, nom, id_categorie) {
        document.getElementById('update_id_sous_categorie').value = id;
        document.getElementById('update_nom_sous_categorie').value = nom;
        document.getElementById('update_id_categorie').value = id_categorie;
        document.getElementById('updateSousCategoryForm').classList.remove('hidden');
    }

    function hideUpdateSousCategoryForm() {
        document.getElementById('updateSousCategoryForm').classList.add('hidden');
    }

    function showAddSousCategoryForm() {
        document.getElementById('addSousCategoryForm').classList.remove('hidden');
    }

    function hideAddSousCategoryForm() {
        document.getElementById('addSousCategoryForm').classList.add('hidden');
    }
</script>
</body>
</html>