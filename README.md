# Gitbook API wrapper for PHP

Note that The GitBook API is still in beta, so the underlying API and this wrapper are subject to change.

# Features
- ✅ Authentication
- ✅ Get Current user
- ✅ Get User
- ⬜️ Get Organization
- ⬜️ Get Organisations
- ✅ List Current User Spaces
- ⬜️ List User or Organization Spaces
- ⬜️ Get Space
- ⬜️ Get Space Content Analytics
- ⬜️ Get Space Search Analytics

# Usage

## Create a client

```php
$gitbook = new GitbookClient($secretKey);
```

## Get the current user

```php
$gitbook->getCurrentUser();
```

## Get user

```php
$gitbook->getUser($userUid);
```

## Get spaces for current user

```php
$gitbook->getSpaces();
```

## Get spaces for specific user or organisation

```php
$gitbook->getSpacesFor($userUid);
$gitbook->getSpacesFor($organisationUid);
```
