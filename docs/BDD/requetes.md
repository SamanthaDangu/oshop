# requetes

pour récupérer un seul produit

```sql
SELECT * FROM product WHERE id = 1
```

pour récupérer tous les produits

```sql
 SELECT * FROM product
```

la liste des produits filtré par marque

```sql
SELECT * FROM product WHERE brand_id = 2
```

la liste des produits filtrée par catégorie

```sql
SELECT * FROM `product` WHERE `category_id` = '1'
```

la liste des types pour le footer

```sql
select * from type where footer_order >= 1 order by footer_order
-- une autre solution
select * from type where footer_order != 0 order by footer_order
```

la liste des marques pour le footer

```sql
select * from brand where footer_order >= 1 order by footer_order
-- une autre solution
select * from brand where footer_order != 0 order by footer_order
```
