document.addEventListener('DOMContentLoaded', () => {
    // Select elements (existing code)
    const mobileSearchIcon = document.querySelector('.mobile-search-icon');
    const mobileSearchForm = document.querySelector('.mobile-search-form');
    const sidebarToggle = document.querySelector('.sidebar-toggle');
    const leftSidebar = document.querySelector('.left-sidebar');
    const loginTrigger = document.querySelector('.login');
    const loginModal = document.querySelector('#login-modal');
    const loginModalClose = document.querySelector('.login-modal-close');
    const cancelBtn = document.querySelector('.cancel-btn');

    // Existing toggle functions (unchanged)
    const toggleSearchForm = () => {
        if (!mobileSearchForm) {
            console.warn('Mobile search form not found in the DOM.');
            return;
        }
        mobileSearchForm.classList.toggle('active');
    };

    const toggleSidebar = () => {
        if (!leftSidebar) {
            console.warn('Left sidebar not found in the DOM.');
            return;
        }
        if (leftSidebar.classList.contains('active')) {
            leftSidebar.style.transform = 'translateX(100%)';
            setTimeout(() => {
                leftSidebar.classList.remove('active');
            }, 300);
        } else {
            leftSidebar.classList.add('active');
            setTimeout(() => {
                leftSidebar.style.transform = 'translateX(0)';
            }, 10);
        }
    };

    const toggleLoginModal = () => {
        if (!loginModal) {
            console.warn('Login modal not found in the DOM.');
            return;
        }
        loginModal.classList.toggle('active');
        loginModal.setAttribute('aria-hidden', loginModal.classList.contains('active') ? 'false' : 'true');
    };

    // Voting functionality
    const upvoteButtons = document.querySelectorAll('.upvote');
    const downvoteButtons = document.querySelectorAll('.downvote');

    upvoteButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            handleVote(button, 'upvote');
        });
    });

    downvoteButtons.forEach(button => {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            handleVote(button, 'downvote');
        });
    });

    const handleVote = (button, voteType) => {
        const postId = button.getAttribute('data-post-id');
        const voteBox = button.closest('.vote-box');
        const voteCountElement = voteBox.querySelector('.vote-count');
        const upvoteButton = voteBox.querySelector('.upvote');
        const downvoteButton = voteBox.querySelector('.downvote');

        // Send AJAX request
        const data = new FormData();
        data.append('action', 'reddit_vote');
        data.append('post_id', postId);
        data.append('vote_type', voteType);

        fetch(redditLiteAjax.ajaxurl, {
            method: 'POST',
            body: data
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update the vote count
                voteCountElement.textContent = data.data.votes;

                // Update the button states based on the user's vote
                upvoteButton.classList.remove('active');
                downvoteButton.classList.remove('active');
                if (data.data.user_vote === 'upvote') {
                    upvoteButton.classList.add('active');
                } else if (data.data.user_vote === 'downvote') {
                    downvoteButton.classList.add('active');
                }
            } else {
                alert(data.data.message); // Show error message (e.g., "You must be logged in to vote.")
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred while voting.');
        });
    };

    // Existing event listeners (unchanged)
    if (mobileSearchIcon) {
        mobileSearchIcon.addEventListener('click', (event) => {
            event.stopPropagation();
            toggleSearchForm();
        });

        mobileSearchIcon.addEventListener('keypress', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                toggleSearchForm();
            }
        });
    }

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', (event) => {
            event.stopPropagation();
            toggleSidebar();
        });

        sidebarToggle.addEventListener('keypress', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                toggleSidebar();
            }
        });
    }

    if (loginTrigger) {
        loginTrigger.addEventListener('click', (event) => {
            event.stopPropagation();
            toggleLoginModal();
        });

        loginTrigger.addEventListener('keypress', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                toggleLoginModal();
            }
        });
    }

    if (loginModalClose) {
        loginModalClose.addEventListener('click', () => {
            toggleLoginModal();
        });

        loginModalClose.addEventListener('keypress', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                toggleLoginModal();
            }
        });
    }

    if (cancelBtn) {
        cancelBtn.addEventListener('click', () => {
            toggleLoginModal();
        });

        cancelBtn.addEventListener('keypress', (event) => {
            if (event.key === 'Enter' || event.key === ' ') {
                event.preventDefault();
                toggleLoginModal();
            }
        });
    }

    document.addEventListener('click', (event) => {
        if (mobileSearchForm && !event.target.closest('.mobile-search-form') && !event.target.closest('.mobile-search-icon')) {
            if (mobileSearchForm.classList.contains('active')) {
                toggleSearchForm();
            }
        }
        if (leftSidebar && !event.target.closest('.left-sidebar') && !event.target.closest('.sidebar-toggle')) {
            if (leftSidebar.classList.contains('active')) {
                toggleSidebar();
            }
        }
        if (loginModal && !event.target.closest('.login-modal-content') && !event.target.closest('.login')) {
            if (loginModal.classList.contains('active')) {
                toggleLoginModal();
            }
        }
    });
});