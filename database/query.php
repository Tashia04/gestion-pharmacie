<?php

function getCategories($pdo)
{
  $stmt = $pdo->query("SELECT * FROM categories");
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function countCategories($pdo)
{
  $stmt = $pdo->query("SELECT COUNT(*) as count FROM categories");
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  return $result['count'];
}

function getCategoryById($pdo, $id)
{
  $stmt = $pdo->prepare("SELECT * FROM categories WHERE id = :id");
  $stmt->execute(['id' => $id]);
  return $stmt->fetch(PDO::FETCH_ASSOC);
}
