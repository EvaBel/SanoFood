package org.example;

import entities.Commande;
import services.CommandeService;

import java.time.LocalDateTime;
import java.util.List;

public class Main {
    public static void main(String[] args) {

        CommandeService commandeService = new CommandeService();
        Commande commande = new Commande(0, 1, LocalDateTime.now(), "En attente", "123 rue Paris", "0123456789", "Carte", 99.99f, null);
        commandeService.create(commande);

        }

    }

