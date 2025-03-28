# Laravel Query Builder Documentation

## Aperçu

Le Query Builder de Laravel fournit une interface fluide et pratique pour interagir avec votre base de données. Il permet de construire des requêtes SQL de manière programmatique et facilite la gestion des requêtes complexes. Dans cette documentation, nous allons couvrir les méthodes de base du Query Builder, puis nous concentrer sur celles utilisées dans le `DashboardController` pour obtenir les statistiques du tableau de bord.

---

## Méthodes de base du Query Builder

Voici quelques-unes des méthodes les plus couramment utilisées avec le Query Builder de Laravel :

### 1. `table()`

La méthode `table` est utilisée pour spécifier la table sur laquelle vous souhaitez effectuer une requête.

```php
DB::table('users');
```

### 2. `select()`

La méthode `select` est utilisée pour définir les colonnes à récupérer.

```php
DB::table('users')->select('name', 'email');
```

### 3. `where()`

La méthode `where` permet d'ajouter des clauses `WHERE` à votre requête.

```php
DB::table('users')->where('status', 'active');
```

### 4. `join()`

La méthode `join` est utilisée pour effectuer une jointure SQL entre deux tables.

```php
DB::table('orders')
    ->join('users', 'orders.user_id', '=', 'users.id');
```

### 5. `groupBy()`

La méthode `groupBy` permet de regrouper les résultats par une ou plusieurs colonnes.

```php
DB::table('plants')
    ->groupBy('category_id');
```

### 6. `orderBy()`

La méthode `orderBy` permet de trier les résultats selon une ou plusieurs colonnes.

```php
DB::table('users')->orderBy('name', 'asc');
```

### 7. `limit()`

La méthode `limit` permet de limiter le nombre de résultats retournés.

```php
DB::table('users')->limit(10);
```

### 8. `count()`

La méthode `count` permet de compter le nombre de lignes correspondant à la requête.

```php
DB::table('orders')->count();
```

### 9. `raw()`

La méthode `raw` permet d'exécuter des expressions SQL brutes.

```php
DB::table('order_plant')
    ->select(DB::raw('count(plant_id) as orders_count'));
```

### 10. `get()`

La méthode `get` permet d'exécuter la requête et de récupérer les résultats.

```php
DB::table('users')->get();
```

---

## Exemple complet du code dans `DashboardController`

Le code suivant utilise les méthodes du Query Builder pour récupérer les statistiques du tableau de bord :

```php
public function index()
{
    try {
        // Nombre total de commandes
        $totalOrders = Order::count();

        // Plantes les plus populaires (basé sur le nombre de fois où elles ont été commandées)
        $mostPopularPlants = DB::table('order_plant')
            ->select('plants.name', DB::raw('count(order_plant.plant_id) as orders_count'))
            ->join('plants', 'plants.id', '=', 'order_plant.plant_id')
            ->groupBy('plants.name')
            ->orderByDesc('orders_count')
            ->limit(5)
            ->get();

        // Répartition des plantes par catégorie
        $categoryDistribution = DB::table('plants')
            ->select('categories.name as category_name', DB::raw('count(plants.id) as plant_count'))
            ->join('categories', 'categories.id', '=', 'plants.category_id')
            ->groupBy('categories.name')
            ->get();

        return response()->json(compact('totalOrders', 'mostPopularPlants', 'categoryDistribution'), 200);
    } catch (\Throwable $th) {
        return response()->json([
            'status' => false,
            'message' => $th->getMessage(),
        ], 500);
    }
}
```

### Résumé

Dans ce contrôleur, nous avons utilisé les méthodes suivantes du Query Builder :

- `table()` — Spécifie la table à interroger.
- `select()` — Définit les colonnes à récupérer.
- `join()` — Effectue des jointures entre les tables.
- `groupBy()` — Regroupe les résultats.
- `orderByDesc()` — Trie les résultats en ordre décroissant.
- `limit()` — Limite le nombre d'enregistrements retournés.
- `get()` — Exécute la requête et récupère les résultats.

---

## Conclusion

Le Query Builder de Laravel offre une syntaxe claire et expressive pour interagir avec votre base de données. Il simplifie la construction de requêtes SQL tout en permettant d'écrire des requêtes puissantes et flexibles. Grâce aux méthodes présentées dans cette documentation, vous pouvez facilement effectuer des opérations telles que la sélection, le filtrage, le regroupement et le tri des données, ce qui en fait un outil idéal pour le développement d'applications robustes.

